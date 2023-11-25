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
    public function store(StoreArchivoRequest $request)
    {
        $request->validated();
        $file = $request->file('archivo');
        $nombre_archivo = date('YmdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('archivos')->put($nombre_archivo,File::get($file));
        $archivo = Archivo::create([
            'titulo'    => $request->titulo,
            'descripcion'   => $request->descripcion,
            'nombrearchivo' => $nombre_archivo
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Archivo Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $archivo = Archivo::where('id', $request->id)->first();
        return $archivo;
    }
    public function update(Request $request)
    {   
        // $archivo = Archivo::where('id',$request->id)->first();
        // if ($request->hasFile('archivo')) {
        //     $file = $request->file('archivo');
        //     $request->validate([
        //         'archivo' => 'required|file|max:2000|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,gif,webp',
        //     ],[
        //         'archivo.required' => 'El archivo es obligatorio.',
        //         'archivo.mimes' => 'ESolo se acepta tipo de archivos como pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,gif,webp',
        //         'archivo.file' => 'El archivo debe ser de tipo file.',
        //         'archivo.max' => 'El tamaño máximo permitido es de 2000 kilobytes.',
        //     ]);
        //     if (Storage::disk('archivos')->exists($archivo->nombrearchivo)) {
        //         Storage::disk('archivos')->delete($archivo->nombrearchivo);
        //     }
        //     $file = $request->file('archivo');
        //     $nombre_archivo = date('YmdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        //     Storage::disk('archivos')->put($nombre_archivo,File::get($file));
        //     $archivo->nombrearchivo           = $nombre_archivo;
        // } else {
        //     $request->validate([
        //         'titulo' => 'required',
        //     ],[
        //         'titulo.required' => 'El Titulo es obligatorio.',
        //     ]);
        // }
        // $archivo->titulo           = $request->titulo;
        // $archivo->save();
        // return response()->json([
        //     'ok' => 1,
        //     'mensaje' => 'Archivo modificado satisfactoriamente'
        // ],200);
        $archivo = Archivo::findOrFail($request->id);
        $reglasComunes = [
            'titulo' => 'required',
        ];
        
        $mensajesComunes = [
            'titulo.required' => 'El Titulo es obligatorio.',
        ];
        
        if ($request->hasFile('archivo')) {
            $reglasArchivo = [
                'archivo' => 'required|file|max:2000|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,gif,webp',
            ];
        
            $mensajesArchivo = [
                'archivo.required' => 'El archivo es obligatorio.',
                'archivo.mimes' => 'Solo se aceptan archivos como pdf, doc, docx, ppt, pptx, xls, xlsx, jpg, jpeg, png, gif, webp.',
                'archivo.file' => 'El archivo debe ser de tipo file.',
                'archivo.max' => 'El tamaño máximo permitido es de 2000 kilobytes.',
            ];
        
            $request->validate($reglasArchivo, $mensajesArchivo);
        
            if (Storage::disk('archivos')->exists($archivo->nombrearchivo)) {
                Storage::disk('archivos')->delete($archivo->nombrearchivo);
            }
        
            $file = $request->file('archivo');
            $nombre_archivo = date('YmdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('archivos')->put($nombre_archivo,File::get($file));
            $archivo->nombrearchivo = $nombre_archivo;

        }

        $request->validate($reglasComunes, $mensajesComunes);
        $archivo->titulo = $request->titulo;
        $archivo->descripcion = $request->descripcion;
        $archivo->save();
        
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Archivo modificado satisfactoriamente'
        ], 200);
    }
    public function destroy(Request $request)
    {
        $archivo = Archivo::where('id', $request->id)->first();
        if (Storage::disk('archivos')->exists($archivo->nombrearchivo)) {
            Storage::disk('archivos')->delete($archivo->nombrearchivo);
        }

        $archivo->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Archivo eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $archivos = Archivo::get();
        return $archivos;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Archivo::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(descripcion) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(nombrearchivo) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
}
