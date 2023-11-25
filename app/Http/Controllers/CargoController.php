<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cargo\StoreCargoRequest;
use App\Http\Requests\Cargo\UpdateCargoRequest;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function store(StoreCargoRequest $request)
    {
        $request->validated();

        $cargo = Cargo::create([
            'nombre'    => $request->nombre,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Cargo Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $cargo = Cargo::where('id', $request->id)->first();
        return $cargo;
    }
    public function update(UpdateCargoRequest $request)
    {
        $request->validated();
        $cargo = Cargo::where('id',$request->id)->first();
        $cargo->nombre = $request->nombre;
        $cargo->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Cargo modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $cargo = Cargo::where('id', $request->id)->first();
        $cargo->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Cargo eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $cargos = Cargo::get();
        return $cargos;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Cargo::whereRaw('UPPER(nombre) LIKE ?', ['%'.$buscar.'%'])
            ->paginate($paginacion);
    }
}
