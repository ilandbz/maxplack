<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\archivo\StoreArchivoRequest;
use App\Http\Requests\archivo\UpdateArchivoRequest;
use App\Models\Archivo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function store(StoreArchivoRequest $request){

        $archivo = $request->file('archivo');

        $nombreArchivo = str_replace(' ', '_', $archivo->getClientOriginalName());
    
        Storage::disk('archivos')->put($nombreArchivo,File::get($archivo));

        $archivo = Archivo::create([
            'titulo'           => $request->titulo,
            'nombrearchivo'    => $request->nombrearchivo,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Archivo Registrado satisfactoriamente'
        ],200);
    }
    // public function destroy(Request $request){
    //     $noticia = Noticia::find($request->id);
    //     //$imagenesnoticia = ImagenNoticia::where('noticia_id',$request->id)->first();

    //     Storage::disk('noticias')->deleteDirectory($noticia->id);
    //     $noticia->delete(); 
    //     return response()->json([
    //         'ok' => 1,
    //         'mensaje' => 'Noticia eliminado satisfactoriamente'
    //     ],200);
    // }
    // public function update(UpdateNoticiaRequest $request){
    //     $noticia = Noticia::where('id',$request->id)->first();
    //     $noticia->update([
    //         'titulo'           => $request->titulo,
    //         'subtitulo'        => $request->subtitulo,
    //         'slug'             => $request->slug,
    //         'contenido'        => $request->contenido,
    //     ]);
    //     return response()->json([
    //         'ok' => 1,
    //         'mensaje' => 'Noticia modificado satisfactoriamente'
    //     ],200);
    // }
 
    // public function show(Request $request){
    //     $noticia=Noticia::with('imagen')->where('id', $request->id)->first();
    //     return $noticia;
    // }
    // public function listar(Request $request){
    //     $buscar = mb_strtoupper($request->buscar);
    //     $paginacion = $request->paginacion;
    //     return Noticia::where(function ($query) use ($buscar) {
    //         $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
    //             ->orWhere('subtitulo', 'LIKE', '%' . $buscar . '%')
    //             ->orWhere('contenido', 'LIKE', '%' . $buscar . '%')
    //             ->orWhere('slug', 'LIKE', '%'.$buscar.'%');
    //     })->paginate($paginacion);
    // }


}
