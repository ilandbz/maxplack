<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoConvocatoria\StoreTipoConvocatoriaRequest;
use App\Http\Requests\TipoConvocatoria\UpdateTipoConvocatoriaRequest;
use App\Models\TipoConvocatoria;
use Illuminate\Http\Request;

class TipoConvocatoriaController extends Controller
{
    public function store(StoreTipoConvocatoriaRequest $request)
    {
        $request->validated();

        $tipoconvocatoria = TipoConvocatoria::create([
            'nombre'    => $request->nombre,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Tipo Convocatoria Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $tipoconvocatoria = TipoConvocatoria::where('id', $request->id)->first();
        return $tipoconvocatoria;
    }
    public function update(UpdateTipoConvocatoriaRequest $request)
    {
        $request->validated();
        $tipoconvocatoria = TipoConvocatoria::where('id',$request->id)->first();
        $tipoconvocatoria->nombre = $request->nombre;
        $tipoconvocatoria->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Tipo Convocatoria modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $tipoconvocatoria = TipoConvocatoria::where('id', $request->id)->first();
        $tipoconvocatoria->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Tipo Convocatoria eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $tipoconvocatorias = TipoConvocatoria::get();
        return $tipoconvocatorias;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return TipoConvocatoria::whereRaw('UPPER(nombre) LIKE ?', ['%'.$buscar.'%'])
            ->paginate($paginacion);
    }
}
