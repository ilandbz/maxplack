<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\MenuRole;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function validarLogin(LoginRequest $request)
    {
        $request->validated();

        $credenciales = ['name' => $request->name, 'password' => $request->password, 'es_activo' => 1];

        $user = User::where('name',$request->name)->first();

        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                if(auth()->attempt($credenciales))
                {
                    $user = auth()->user();

                    $usuario = User::with('role:id,nombre')
                                    ->where('id',$user->id)->first()
                    ;

                    $success['token'] = $user->createToken('token-api')->plainTextToken;
                    $success['user'] = $usuario->id;

                    $success = JWT::encode($success,env('VITE_SECRET_KEY'),'HS256');

                    return response()->json($success,200);

                } else {
                    return response()->json([
                        'errors' => ['email' => 'Usuario Suspendido']
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
                'errors' => [ 'email' => 'Email no válido']
            ], 422);
        }
    }
    public function logout(Request $request)
    {
        // $user = DB::table('personal_access_tokens')
        //         ->where('tokenable_id',$request->id)
        //         ->delete();
        Auth::user()->tokens->each(function($token,$key){
            $token->delete()  ;
        });

        return response()->json([
            'ok' => 1,
            'mensaje' =>'Sessión cerrada Satisfactoriamiente'
        ], 200);
    }
}