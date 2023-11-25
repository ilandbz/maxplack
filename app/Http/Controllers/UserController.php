<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUserRequest;
use App\Http\Requests\Usuario\UpdatePasswordRequest;
use App\Http\Requests\Usuario\UpdateProfileRequest;
use App\Http\Requests\Usuario\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(StoreUserRequest $request){

        $usuario = User::create([
            'name'          => $request->name,
            'role_id'           => $request->role_id,
            'password'          => Hash::make($request->numero_dni),
        ]);
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Usuario Registrado satisfactoriamente'
        ],200);
    }
    public function update(UpdateUserRequest $request){
        $usuario = User::find($request->id);
        $usuario->name=$request->name;
        $usuario->role_id=$request->role_id;
        $usuario->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Usuario Actualizado satisfactoriamente'
        ],200);
    }
    public function actualizarperfil(UpdateProfileRequest $request){
        $usuario = User::find(Auth::user()->id);
        $usuario->name = $request->name;
        $usuario->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Registro modificado satisfactoriamente'
        ],200);
    }

    public function show(Request $request){
        $user = User::with('role:id,nombre')
        ->where('id', $request->id)->first();
        return $user;
    }
    public function mostrarDatoUsuario(Request $request): User
    {
        $menu = [];
        $usuario=User::with('role:id,nombre')->where('id',$request->id)->first();
        $menus = $usuario->obtenerMenus($usuario->role->id)->toArray();
        array_merge($menus,$menu);
        $usuario->menus = $menus;

        return $usuario;
    }

    public function habilitados(Request $request)
    {
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return User::with(
            'role:id,nombre'
        )
        ->where(function($query) use($buscar) {
            $query->whereRaw("upper(name) like ?", ['%'.strtoupper($buscar).'%'])
                ->orWhereHas('role', function($q) use($buscar){
                    $q->whereRaw('upper(nombre) like ?', ['%'.strtoupper($buscar).'%'])
                        ;
                });
        })
        ->paginate($paginacion);
    }
    public function eliminados(Request $request)
    {
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return User::with(
            'role:id,nombre'
        )
        ->where(function($query) use($buscar) {
            $query->whereRaw("upper(name) like ?", ['%'.strtoupper($buscar).'%'])
                ->orWhereHas('role', function($q) use($buscar){
                    $q->whereRaw('upper(nombre) like ?', ['%'.strtoupper($buscar).'%'])
                        ;
                });
        })->onlyTrashed()
        ->paginate($paginacion);
    }
    public function todos(Request $request)
    {
        $buscar = mb_strtoupper($request->buscar);
        $paginacion = $request->paginacion;
        return User::with([
            'role:id,nombre'
        ])
        ->where(function($query) use($buscar) {
            $query->whereRaw("upper(name) like ?", ['%'.strtoupper($buscar).'%'])
                ->orWhereHas('role', function($q) use($buscar){
                    $q->whereRaw('upper(nombre) like ?', ['%'.strtoupper($buscar).'%'])
                        ;
                });
        })->withTrashed()
        ->paginate($paginacion);
    }
    public function resetclave(Request $request){
        $user = User::where('id', $request->id)
                    ->first();
        $user->password = Hash::make($user->name);
        $user->save();
        return response()->json([
            'ok' => 1,
            'mensaje' => 'Clave Reseteado con Exito'
        ],200);
    }
    public function cambiarclaveperfil(UpdatePasswordRequest $request){
        //$request->validated();
        $user = Auth::user();
        if(Hash::check($request->current_password,$user->password)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'ok' => 1,
                'mensaje' => 'Clave Cambiado con Exito'
            ],200);
        }
        else {
            return response()->json([
                'errors' => [
                    'current_password' => [
                        'Contraseña Incorrecta'
                    ]
                ]
            ],422);
        }
    }
}
