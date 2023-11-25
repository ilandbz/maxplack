<?php

namespace App\Http\Controllers;


use App\Http\Requests\Seccion\StoreSeccionRequest;
use App\Http\Requests\Seccion\UpdateSeccionRequest;
use App\Models\SeccionesPrincipal;
use Illuminate\Http\Request;

class SeccionesPrincipalController extends Controller
{
    public function store(StoreSeccionRequest $request)
    {
        $request->validated();
        $seccion = SeccionesPrincipal::create([
            'titulo'    => $request->titulo,
            'contenido' => $request->contenido,
            'orden'     => $request->orden,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Seccion Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $seccion = SeccionesPrincipal::where('id', $request->id)->first();
        return $seccion;
    }
    public function update(UpdateSeccionRequest $request)
    {
        $request->validated();
        $seccion = SeccionesPrincipal::where('id',$request->id)->first();
        $seccion->titulo = $request->titulo;
        $seccion->contenido = $request->contenido;
        $seccion->orden = $request->orden;
        $seccion->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Seccion modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $seccion = SeccionesPrincipal::where('id', $request->id)->first();
        $seccion->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Seccion eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $seccions = SeccionesPrincipal::get();
        return $seccions;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return SeccionesPrincipal::whereRaw('UPPER(titulo) LIKE ?', ['%'.$buscar.'%'])
            ->paginate($paginacion);
    }
}
