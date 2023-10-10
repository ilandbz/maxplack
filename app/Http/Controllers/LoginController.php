<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function validarLogin(LoginRequest $request)
    {
        //$request->validated();

        $credenciales = ['name' => $request->name, 'password' => $request->password, 'es_activo' => 1];

        $user = User::where('name',$request->name)->first();

        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                if(auth()->attempt($credenciales))
                {
                    $user = User::find(Auth::user()->id);
                    
                    $permiso = [];
                    $menu = [];
                    //$permisos = $user->obtenerPermisos($user->role_id)->toArray();
                    //array_merge($permisos,$permiso);

                    //$menus = $user->obtenerMenus($user->role_id)->toArray();
                    //array_merge($menus,$menu);


                    // $success['user']['permisos'] = $permisos;
                    // $success['user']['menus'] = $menus;

                    return response()->json($user,200);

                } else {
                    return response()->json([
                        'errors' => ['name' => 'Usuario Suspendido']
                    ],422);
                }
            }
            else {
                return response()->json([
                    'errors' => ['password' => 'Contraseña Incorrecta']
                ],422);
            }
        }
        else {
            return response([
                'errors' => [ 'name' => 'Usuario no válido']
            ], 422);
        }
    }
}