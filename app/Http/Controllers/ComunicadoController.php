<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Comunicado\StoreComunicadoRequest;
use App\Models\Comunicado;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ComunicadoController extends Controller
{
    public function store(StoreComunicadoRequest $request)
    {
        $request->validated();
        $imagen= $request->file('imagen');
        $nombre_archivo = date('YmdHis') . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
        Storage::disk('comunicado')->put($nombre_archivo,File::get($imagen));

        $comunicado = Comunicado::create([
            'titulo'        => $request->titulo,
            'nombreImagen'  => $nombre_archivo,
            'link'          => $request->link,
        ]);

        return response()->json([
            'ok' => 1,
            'mensaje' => 'Comunicado Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $comunicado = Comunicado::where('id', $request->id)->first();
        return $comunicado;
    }
    public function update(Request $request)
    {

        $comunicado = Comunicado::findOrFail($request->id);
        
        $reglasComunes = [
            'titulo' => 'required',
        ];
        $mensajesComunes = [
            'titulo.required' => 'El Titulo es obligatorio.',
        ];
        if ($request->hasFile('imagen')) {
            $reglasArchivo = [
                'imagen' => 'required|max:2000|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,gif,webp',
            ];
            $mensajesArchivo = [
                'archivo.required' => 'La imagen es obligatorio.',
                'archivo.mimes' => 'La imagen debe ser solo de tipo: jpg, jpeg, png, gif, webp.',
                'imagen.image' => 'El archivo debe ser de tipo imagen.',
                'archivo.max' => 'El tamaño máximo permitido es de 2000 kilobytes.',
            ];
        
            $request->validate($reglasArchivo, $mensajesArchivo);
        
            if (Storage::disk('comunicado')->exists($comunicado->nombreImagen)) {
                Storage::disk('comunicado')->delete($comunicado->nombreImagen);
            }
        
            $file = $request->file('imagen');
            $nombre_archivo = $comunicado->id. '.' . $file->getClientOriginalExtension();
            Storage::disk('comunicado')->put($nombre_archivo,File::get($file));
            $comunicado->nombreImagen = $nombre_archivo;

        }

        $request->validate($reglasComunes, $mensajesComunes);
        $comunicado->titulo = $request->titulo;
        $comunicado->link = $request->link;
        $comunicado->save();
        
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Comunicado modificado satisfactoriamente'
        ], 200);
    }
    public function destroy(Request $request)
    {
        $comunicado = Comunicado::where('id', $request->id)->first();

        if (Storage::disk('comunicado')->exists($comunicado->nombreImagen)) {
            Storage::disk('comunicado')->delete($comunicado->nombreImagen);
        }

        $comunicado->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Comunicado eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $comunicados = Comunicado::get();
        return $comunicados;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Comunicado::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(link) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
}
