<?php

namespace App\Http\Controllers;

use App\Http\Requests\Galeria\StoreGaleriaRequest;
use App\Http\Requests\Galeria\StoreImagenRequest;
use App\Http\Requests\Galeria\UpdateGaleriaRequest;
use App\Models\Galeria;
use App\Models\ImagenGaleria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class GaleriaController extends Controller
{
    public function store(StoreGaleriaRequest $request)
    {
        $request->validated();

        $galeria = Galeria::create([
            'titulo'            => $request->titulo,
            'descripcion'       => $request->descripcion,
        ]);


        return response()->json([
            'ok' => 1,
            'mensaje' => 'Galeria Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $galeria = Galeria::where('id', $request->id)->first();
        return $galeria;
    }
    public function update(UpdateGaleriaRequest $request)
    {
        $request->validated();
        $galeria = Galeria::where('id',$request->id)->first();
        $galeria->titulo = $request->titulo;
        $galeria->descripcion = $request->descripcion;
        $galeria->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Galeria modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $galeria = Galeria::where('id', $request->id)->first();
        Storage::disk('galeria')->deleteDirectory($galeria->id);
        $galeria->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Galeria eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $galerias = Galeria::get();
        return $galerias;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Galeria::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(descripcion) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
    public function imagenes(Request $request){
        return ImagenGaleria::where('galeria_id', $request->id)->get();
    }
    public function subirImagen(StoreImagenRequest $request){
        $file = $request->file('imagen');
        $nombre_archivo = ImagenGaleria::generarNombreImagen($request->galeria_id,$file);
        ImagenGaleria::create([
            'galeria_id' => $request->galeria_id,
            'nombreimagen' =>$request->galeria_id.'/'.$nombre_archivo
        ]);
        Storage::disk('galeria')->put($request->galeria_id.'/'.$nombre_archivo,File::get($file));
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Imagen Subido Satisfactoriamente'
        ],200);
    }
    public function eliminarImagen(Request $request){
        $registro = ImagenGaleria::find($request->id);
        if (Storage::disk('galeria')->exists($registro->nombreimagen)) {
            Storage::disk('galeria')->delete($registro->nombreimagen);
        } 
        $registro->delete(); 
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Imagen eliminado satisfactoriamente'
        ],200);
    }
}
