<?php

namespace App\Http\Controllers;

use App\Http\Requests\Directorio\StoreDirectorioRequest;
use App\Http\Requests\Directorio\UpdateDirectorioRequest;
use App\Models\Directorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class DirectorioController extends Controller
{
    public function store(StoreDirectorioRequest $request)
    {
        $file = $request->file('foto');
        $nombre_archivo = $request->dni.".".mb_strtolower($file->extension());
        Storage::disk('fotos')->put($nombre_archivo,File::get($file));
        $directorio = Directorio::create([
            'titulo'    => $request->titulo,
            'dni'       => $request->dni,
            'area_id'   => $request->area_id,
            'cargo_id'  => $request->cargo_id,
            'funciones' => $request->funciones,
            'email'     => $request->email,
            'celular'   => $request->celular,
            'foto'      => $nombre_archivo,
            'link'      => $request->link,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Directorio Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $directorio = Directorio::where('id', $request->id)->first();
        return $directorio;
    }
    public function update(Request $request)
    {
        $directorio = Directorio::findOrFail($request->id);
        $reglasComunes = [
            'titulo'        => 'required',
            'dni'           => 'required',
            'area_id'       => 'required|integer',
            'cargo_id'      => 'required|integer',
            'celular'       => 'required|numeric',
        ];
        $mensajesComunes = [
            'required' => 'El Titulo es obligatorio.',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'integer' => 'Solo Numero Enteros',
            'email'  => 'No es un formato de correo Valido',
            'celular.required'    => 'El celular es requerido'
        ];
        if ($request->hasFile('foto')) {
            $reglasArchivo = [
                'foto' => 'required|file|max:2000|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,gif,webp',
            ];
            $mensajesArchivo = [
                'foto.required' => 'La foto es obligatorio.',
                'foto.mimes' => 'La foto debe ser solo de tipo: jpg, jpeg, png, gif, webp.',
                'foto.file' => 'La foto debe ser de tipo file.',
                'foto.max' => 'El tamaño máximo permitido es de 2000 kilobytes.',
            ];
            $request->validate($reglasArchivo, $mensajesArchivo);
            if (Storage::disk('fotos')->exists($directorio->foto)) {
                Storage::disk('fotos')->delete($directorio->foto);
            }
            $file = $request->file('foto');
            $nombre_archivo = $directorio->dni. '.' . $file->getClientOriginalExtension();
            Storage::disk('fotos')->put($nombre_archivo,File::get($file));
            $directorio->foto = $nombre_archivo;
        }
        $request->validate($reglasComunes, $mensajesComunes);
        $directorio->titulo = $request->titulo;
        $directorio->dni = $request->dni;
        $directorio->area_id = $request->area_id;
        $directorio->funciones = $request->funciones;
        $directorio->cargo_id = $request->cargo_id;
        $directorio->email = $request->email;
        $directorio->celular = $request->celular;
        $directorio->link = $request->link;
        $directorio->save();
        
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Directorio modificado satisfactoriamente'
        ], 200);
    }
    public function destroy(Request $request)
    {
        $directorio = Directorio::where('id', $request->id)->first();
        if (Storage::disk('fotos')->exists($directorio->foto)) {
            Storage::disk('fotos')->delete($directorio->foto);
        }
        $directorio->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Registro eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $directorios = Directorio::get();
        return $directorios;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Directorio::with(['area:id,nombre', 'cargo:id,nombre'])->where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(dni) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(celular) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(email) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
}
