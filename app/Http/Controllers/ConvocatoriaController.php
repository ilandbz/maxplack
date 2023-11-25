<?php

namespace App\Http\Controllers;

use App\Http\Requests\Convocatoria\StoreArchivoConvocatoriaRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Convocatoria\StoreConvocatoriaRequest;
use App\Http\Requests\Convocatoria\UpdateConvocatoriaRequest;
use App\Models\ArchivoConvocatoria;
use App\Models\Convocatoria;
use App\Models\EtapaConvocatoria;
use App\Models\TipoConvocatoria;

class ConvocatoriaController extends Controller
{
    public function store(StoreConvocatoriaRequest $request)
    {
        $request->validated();
        $convocatoria = Convocatoria::create([
            'titulo'                => $request->titulo,
            'descripcion'           => $request->descripcion,
            'tipo_convocatoria_id'  => $request->tipo_convocatoria_id,
            'etapa_convocatoria_id' => $request->etapa_convocatoria_id ,
            'estado'                => $request->estado,
            'fecha_inicio'          => $request->fecha_inicio,
            'fecha_fin'             => $request->fecha_fin,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Convocatoria Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $convocatoria = Convocatoria::where('id', $request->id)->first();
        return $convocatoria;
    }
    public function update(UpdateConvocatoriaRequest $request)
    {
        $request->validated();
        $convocatoria = Convocatoria::where('id',$request->id)->first();
        $convocatoria->titulo                   = $request->titulo;
        $convocatoria->descripcion              = $request->descripcion;
        $convocatoria->tipo_convocatoria_id     = $request->tipo_convocatoria_id;
        $convocatoria->etapa_convocatoria_id    = $request->etapa_convocatoria_id;
        $convocatoria->estado                   = $request->estado;
        $convocatoria->fecha_inicio             = $request->fecha_inicio;
        $convocatoria->fecha_fin                = $request->fecha_fin;
        $convocatoria->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Convocatoria modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $convocatoria = Convocatoria::where('id', $request->id)->first();
        $convocatoria->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Convocatoria eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $convocatorias = Convocatoria::get();
        return $convocatorias;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Convocatoria::with(['tipoconvocatoria:id,nombre', 'etapaconvocatoria:id,nombre'])->where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(descripcion) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
    public function storeArchivoConvocatoria(StoreArchivoConvocatoriaRequest $request){
        $archivoconvocatoria = ArchivoConvocatoria::create([
            'titulo'         => $request->titulo,
            'link'           => $request->link,
            'convocatoria_id'=> $request->convocatoria_id,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Archivo Registrado satisfactoriamente'
        ],200);
    }
    public function archivosConvocatoria(Request $request){
        $archivos = ArchivoConvocatoria::where('convocatoria_id', $request->id)->get();
        return $archivos;
    }
    public function showArchivo(Request $request){
        return ArchivoConvocatoria::where('id', $request->id)->first();
    }
    public function updateArchivo(Request $request){
        $archivo = ArchivoConvocatoria::where('id', $request->id)->first();
        $archivo->titulo = $request->titulo;
        $archivo->link = $request->link;
        $archivo->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Se Guardo satisfactoriamente'
        ],200);
    }
    public function eliminarArchivo(Request $request){
        $archivoconvocatoria = ArchivoConvocatoria::where('id', $request->id)->first();
        $archivoconvocatoria->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Archivo Convocatoria eliminado satisfactoriamente'
        ],200);
    }

    public function tipoConvocatorias(){
        $tipoconvocatorias = TipoConvocatoria::get();
        return $tipoconvocatorias;
    }
    public function etapaConvocatorias(){
        $tipoconvocatorias = EtapaConvocatoria::get();
        return $tipoconvocatorias;
    }

}
