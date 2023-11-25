<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(StoreRoleRequest $request)
    {
        $request->validated();

        $role = Role::create([
            'nombre'    => $request->nombre,
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Area Registrado satisfactoriamente'
        ],200);
    }
    public function show(Request $request)
    {
        $role = Role::where('id', $request->id)->first();
        return $role;
    }
    public function update(UpdateRoleRequest $request)
    {
        $request->validated();
        $role = Role::where('id',$request->id)->first();
        $role->nombre = $request->nombre;
        $role->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Area modificado satisfactoriamente'
        ],200);
    }
    public function destroy(Request $request)
    {
        $role = Role::where('id', $request->id)->first();
        $role->delete();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Area eliminado satisfactoriamente'
        ],200);
    }
    public function todos(){
        $roles = Role::get();
        return $roles;
    }
    public function listar(Request $request){
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return Role::whereRaw('UPPER(nombre) LIKE ?', ['%'.$buscar.'%'])
            ->paginate($paginacion);
    }
}
