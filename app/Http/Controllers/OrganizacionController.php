<?php

namespace App\Http\Controllers;

use App\Http\Requests\Organizacion\UpdateOrganizacionRequest;
use App\Models\Organizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $organizacion = Organizacion::where('id', $request->id)->first();
        return $organizacion;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizacionRequest $request)
    {

        $organizacion = Organizacion::find($request->id);
        $organizacion->ruc=$request->ruc;
        $organizacion->razon_social=$request->razon_social;
        $organizacion->titulo=$request->titulo;
        $organizacion->slogan=$request->slogan;
        $organizacion->descripcion=$request->descripcion;
        $organizacion->director=$request->director;
        $organizacion->direccion=$request->direccion;
        $organizacion->email=$request->email;
        $organizacion->telefono=$request->telefono;
        $organizacion->telefono2=$request->telefono2;
        $organizacion->url_web=$request->url_web;
        $organizacion->quienes_somos=$request->quienes_somos;
        $organizacion->vision=$request->vision;
        $organizacion->mision=$request->mision;
        if ($request->hasFile('logo')) {
            $reglasArchivo = [
                'logo' => 'required|image|mimes:jpg,jpeg,png,gif,webp,ico|max:1000',
            ];
            $mensajesArchivo = [
                'logo.mimes' => 'La imagen debe ser solo de tipo: jpg, jpeg, png, gif, webp.',
                'logo.max' => 'El tamaño máximo permitido es de 1000 kilobytes.',
            ];
            $request->validate($reglasArchivo, $mensajesArchivo);
            if (Storage::disk('imagenes')->exists($organizacion->logo)) {
                Storage::disk('imagenes')->delete($organizacion->logo);
            }
            $imagen = $request->file('logo');
            $nombre_archivo = 'logo.' . $imagen->getClientOriginalExtension();
            Storage::disk('imagenes')->put($nombre_archivo,File::get($imagen));
            $organizacion->logo=$nombre_archivo;
        }
        if ($request->hasFile('icono')) {
            $reglasArchivo = [
                'icono' => 'required|image|mimes:jpg,jpeg,png,gif,webp,ico|max:1000',
            ];
            $mensajesArchivo = [
                'icono.image'   => 'Seleccione Imagen',
                'icono.mimes' => 'La imagen debe ser solo de tipo: jpg, jpeg, png, gif, webp.',
                'icono.max' => 'El tamaño máximo permitido es de 1000 kilobytes.',
            ];
            $request->validate($reglasArchivo, $mensajesArchivo);
            if (Storage::disk('imagenes')->exists($organizacion->icono)) {
                Storage::disk('imagenes')->delete($organizacion->icono);
            }
            $imagen = $request->file('logo');
            $nombre_archivo = 'favicon.' . $imagen->getClientOriginalExtension();
            Storage::disk('imagenes')->put($nombre_archivo,File::get($imagen));
            $organizacion->icono=$nombre_archivo;
        }
        $organizacion->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Datos Guardado satisfactoriamente'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizacion $organizacion)
    {
        //
    }
}
