<?php

namespace App\Http\Controllers;

use App\Http\Requests\Enlace\StoreEnlaceRequest;
use App\Models\Enlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class EnlaceController extends Controller
{
    public function store(StoreEnlaceRequest $request)
    {
        $request->validated();
        $imagen= $request->file('imagen');
        $nombre_archivo = date('YmdHis') . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
        Storage::disk('enlace')->put($nombre_archivo,File::get($imagen));
        $enlace = Enlace::create([
            'title'        => $request->title,
            'nombreImagen'  => $nombre_archivo,
            'link'          => $request->link,
        ]);

        return response()->json([
            'ok' => 1,
            'mensaje' => 'Enlace Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $enlace = Enlace::where('id', $request->id)->first();
        return $enlace;
    }
    public function update(Request $request)
    {
        $enlace = Enlace::findOrFail($request->id);
        $reglasComunes = [
            'title' => 'required',
        ];
        $mensajesComunes = [
            'titulo.required' => 'El Titulo es obligatorio.',
        ];
        if ($request->hasFile('imagen')) {
            $reglasArchivo = [
                'imagen' => 'required|max:2000|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,gif,webp',
            ];
            $mensajesArchivo = [
                'imagen.required' => 'La imagen es obligatorio.',
                'imagen.mimes' => 'La imagen debe ser solo de tipo: jpg, jpeg, png, gif, webp.',
                'imagen.file' => 'El imagen debe ser de tipo file.',
                'imagen.max' => 'El tamaño máximo permitido es de 2000 kilobytes.',
            ];
            $request->validate($reglasArchivo, $mensajesArchivo);
            if (Storage::disk('enlace')->exists($enlace->nombreImagen)) {
                Storage::disk('enlace')->delete($enlace->nombreImagen);
            }
            $file = $request->file('imagen');
            $nombre_archivo = $enlace->id. '.' . $file->getClientOriginalExtension();
            Storage::disk('enlace')->put($nombre_archivo,File::get($file));
            $enlace->nombreImagen = $nombre_archivo;
        }
        $request->validate($reglasComunes, $mensajesComunes);
        $enlace->title = $request->title;
        $enlace->link = $request->link;
        $enlace->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Enlace modificado satisfactoriamente'
        ], 200);
    }
    public function destroy(Request $request)
    {
        $enlace = Enlace::where('id', $request->id)->first();
        if (Storage::disk('enlace')->exists($enlace->nombreImagen)) {
            Storage::disk('enlace')->delete($enlace->nombreImagen);
        }
        $enlace->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Enlace eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $enlaces = Enlace::get();
        return $enlaces;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Enlace::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(title) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(link) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
}
