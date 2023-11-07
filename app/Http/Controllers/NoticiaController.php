<?php

namespace App\Http\Controllers;

use App\Http\Requests\noticia\UpdateConImagenRequest;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\noticia\StoreNoticiaRequest;
use App\Http\Requests\noticia\UpdateNoticiaRequest;
use App\Http\Requests\noticia\StoreImagenRequest;
use App\Models\ImagenNoticia;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function store(StoreNoticiaRequest $request){
        $noticia = Noticia::create([
            'titulo'           => $request->titulo,
            'subtitulo'        => $request->subtitulo,
            'slug'             => $request->slug,
            'contenido'        => $request->contenido,
            'user_id'          => Auth::user()->id,
        ]);
        $file = $request->file('imagen');
        $nombre_archivo = ImagenNoticia::generarNombreImagen($noticia->id,$file);
        Storage::disk('noticias')->put($noticia->id.'/'.$nombre_archivo,File::get($file));
        ImagenNoticia::create([
            'noticia_id' => $noticia->id,
            'nombreimagen' =>$noticia->id.'/'.$nombre_archivo
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Noticia Registrado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request){
        $noticia = Noticia::find($request->id);
        //$imagenesnoticia = ImagenNoticia::where('noticia_id',$request->id)->first();

        Storage::disk('noticias')->deleteDirectory($noticia->id);
        $noticia->delete(); 
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Noticia eliminado satisfactoriamente'
        ],200);
    }
    public function update(UpdateNoticiaRequest $request){
        $noticia = Noticia::where('id',$request->id)->first();
        $noticia->update([
            'titulo'           => $request->titulo,
            'subtitulo'        => $request->subtitulo,
            'slug'             => $request->slug,
            'contenido'        => $request->contenido,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Noticia modificado satisfactoriamente'
        ],200);
    }
    public function updateconimagen(UpdateConImagenRequest $request){
        $noticia = Noticia::with('imagen')->where('id',$request->id)->first();
        $noticia->update([
            'titulo'           => $request->titulo,
            'subtitulo'        => $request->subtitulo,
            'slug'             => $request->slug,
            'contenido'        => $request->contenido,
        ]);
        $file = $request->file('imagen');
        Storage::disk('noticias')->put($noticia->imagen->nombreimagen,File::get($file));
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Noticia modificado satisfactoriamente'
        ],200);
    }    
    public function show(Request $request){
        $noticia=Noticia::with('imagen')->where('id', $request->id)->first();
        return $noticia;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Noticia::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                ->orWhere('subtitulo', 'LIKE', '%' . $buscar . '%')
                ->orWhere('contenido', 'LIKE', '%' . $buscar . '%')
                ->orWhere('slug', 'LIKE', '%'.$buscar.'%');
        })->paginate($paginacion);
    }
    public function imagenes(Request $request){
        return ImagenNoticia::where('noticia_id', $request->id)->get();
    }
    public function subirImagen(StoreImagenRequest $request){
        $file = $request->file('imagen');
        $nombre_archivo = ImagenNoticia::generarNombreImagen($request->noticia_id,$file);
        ImagenNoticia::create([
            'noticia_id' => $request->noticia_id,
            'nombreimagen' =>$request->noticia_id.'/'.$nombre_archivo
        ]);
        Storage::disk('noticias')->put($request->noticia_id.'/'.$nombre_archivo,File::get($file));
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Imagen Subido Satisfactoriamente'
        ],200);
    }
    public function eliminarImagen(Request $request){
        $registro = ImagenNoticia::find($request->id);
        if (Storage::disk('noticias')->exists($registro->nombreimagen)) {
            Storage::disk('noticias')->delete($registro->nombreimagen);
        } 
        $registro->delete(); 
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Imagen eliminado satisfactoriamente'
        ],200);
    }

}
