<?php

namespace App\Http\Controllers;

use App\Http\Requests\Entrada\StoreEntradaRequest;
use App\Http\Requests\Entrada\UpdateEntradaRequest;
use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function store(StoreEntradaRequest $request)
    {
        $request->validated();

        $entrada = Entrada::create([
            'slug'      => $request->slug,
            'ruta'      => $request->ruta,
            'titulo'    => $request->titulo,
            'contenido' => $request->contenido,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Entrada Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $entrada = Entrada::where('id', $request->id)->first();
        return $entrada;
    }
    public function update(UpdateEntradaRequest $request)
    {
        $request->validated();
        $entrada = Entrada::where('id',$request->id)->first();
        $entrada->slug = $request->slug;
        $entrada->ruta = $request->ruta;
        $entrada->titulo = $request->titulo;
        $entrada->contenido = $request->contenido;
        $entrada->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Entrada modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $entrada = Entrada::where('id', $request->id)->first();
        $entrada->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Entrada eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $entradas = Entrada::get();
        return $entradas;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Entrada::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(slug) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(ruta) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(contenido) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ;

        })
        ->paginate($paginacion);
    }
}
