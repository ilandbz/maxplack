<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedSocial\StoreRedSocialRequest;
use App\Http\Requests\RedSocial\UpdateRedSocialRequest;
use App\Models\RedSocial;
use Illuminate\Http\Request;

class RedesController extends Controller
{
    public function store(StoreRedSocialRequest $request)
    {
        $request->validated();

        $red = RedSocial::create([
            'titulo'        => $request->titulo,
            'url'           => $request->url,
            'icono'         => $request->icono,
            'colorfondo'    => $request->colorfondo,
        ]);


        return response()->json([
            'ok' => 1,
            'mensaje' => 'Red Social Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $red = RedSocial::where('id', $request->id)->first();
        return $red;
    }
    public function update(UpdateRedSocialRequest $request)
    {
        $request->validated();
        $red = RedSocial::where('id',$request->id)->first();
        $red->titulo = $request->titulo;
        $red->url = $request->url;
        $red->icono = $request->icono;
        $red->colorfondo = $request->colorfondo;
        $red->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Red Social modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $red = RedSocial::where('id', $request->id)->first();
        $red->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Red Social eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $reds = RedSocial::get();
        return $reds;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return RedSocial::where(function ($query) use ($buscar) {
            $query->whereRaw('UPPER(titulo) LIKE ?', ['%' . strtoupper($buscar) . '%'])
                  ->orWhereRaw('UPPER(url) LIKE ?', ['%' . strtoupper($buscar) . '%']);
        })
        ->paginate($paginacion);
    }
}
