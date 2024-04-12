<?php

namespace App\Http\Controllers;

use App\Http\Requests\navs\StoreNavRequest;
use App\Http\Requests\navs\UpdateNavRequest;
use App\Models\Nav;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function store(StoreNavRequest $request)
    {
        $request->validated();
        if($request->padre_id !='' || $request->padre_id != null)
        {
            $orden = Nav::maximoHijoId($request->padre_id);
        } else {
            $orden = Nav::maximoPadreId();
        }

        $nav = Nav::create([
            'nombre'    => $request->nombre,
            'url'       => $request->url,
            'ruta'      => $request->ruta,
            'slug'      => $request->slug,
            'icono'     => $request->icono,
            'padre_id'  => $request->padre_id ,
            'orden'     => $orden
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Nav Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $nav = Nav::where('id', $request->id)->first();
        return $nav;
    }
    public function update(UpdateNavRequest $request)
    {
        $request->validated();
        $nav = Nav::where('id',$request->id)->first();
        $nav->nombre           = $request->nombre;
        $nav->url           = $request->url;
        $nav->ruta           = $request->ruta;
        $nav->slug             = $request->slug;
        $nav->icono            = $request->icono;
        $nav->padre_id         = $request->padre_id;
        $nav->orden            = $request->orden;
        $nav->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Nav modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $nav = Nav::where('id', $request->id)->first();
        $nav->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Nav eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $navs = Nav::get();
        return $navs;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Nav::with('padre:id,nombre')->whereRaw('UPPER(nombre) LIKE ?', ['%'.$buscar.'%'])
            ->paginate($paginacion);
    }
}