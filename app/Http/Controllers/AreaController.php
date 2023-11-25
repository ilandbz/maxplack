<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\StoreAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function store(StoreAreaRequest $request)
    {
        $request->validated();

        $area = Area::create([
            'nombre'    => $request->nombre,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Area Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $area = Area::where('id', $request->id)->first();
        return $area;
    }
    public function update(UpdateAreaRequest $request)
    {
        $request->validated();
        $area = Area::where('id',$request->id)->first();
        $area->nombre = $request->nombre;
        $area->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Area modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $area = Area::where('id', $request->id)->first();
        $area->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Area eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $areas = Area::get();
        return $areas;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Area::whereRaw('UPPER(nombre) LIKE ?', ['%'.$buscar.'%'])
            ->paginate($paginacion);
    }
}
