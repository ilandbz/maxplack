<?php

namespace App\Http\Controllers;

use App\Http\Requests\Popup\StorePopupRequest;
use App\Http\Requests\Popup\UpdatePopupRequest;
use App\Http\Requests\Popup\StoreImagenRequest;
use App\Models\ImagenPopup;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class PopupController extends Controller
{
    public function store(StorePopupRequest $request)
    {
        $request->validated();

        $popup = Popup::create([
            'titulo'        => $request->titulo,
            'link'           => $request->link,
            'icono'         => $request->icono,
            'colorfondo'    => $request->colorfondo,
        ]);


        return response()->json([
            'ok' => 1,
            'mensaje' => 'Popup Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $popup = Popup::where('id', $request->id)->first();
        return $popup;
    }
    public function update(UpdatePopupRequest $request)
    {
        $request->validated();
        $popup = Popup::where('id',$request->id)->first();
        $popup->titulo = $request->titulo;
        $popup->link = $request->link;
        $popup->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Popup modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $popup = Popup::where('id', $request->id)->first();
        $popup->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Popup eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $popups = Popup::get();
        return $popups;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Popup::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(link) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
    public function imagenes(Request $request){
        return ImagenPopup::where('popup_id', $request->id)->get();
    }
    public function subirImagen(StoreImagenRequest $request){
        $file = $request->file('imagen');
        $nombre_archivo = ImagenPopup::generarNombreImagen($request->popup_id,$file);
        ImagenPopup::create([
            'popup_id' => $request->popup_id,
            'nombreImagen' =>$request->popup_id.'/'.$nombre_archivo
        ]);
        Storage::disk('popup')->put($request->popup_id.'/'.$nombre_archivo,File::get($file));
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Imagen Subido Satisfactoriamente'
        ],200);
    }
    public function eliminarImagen(Request $request){
        $registro = ImagenPopup::find($request->id);
        if (Storage::disk('popup')->exists($registro->nombreImagen)) {
            Storage::disk('popup')->delete($registro->nombreImagen);
        } 
        $registro->delete(); 
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Imagen eliminado satisfactoriamente'
        ],200);
    }
}
