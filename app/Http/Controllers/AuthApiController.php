<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Carbon\Carbon;

class AuthApiController extends Controller
{
    public function authenticate(Request $request)
    {

        $user = User::autenticate($request->email, $request->password);

        if ($user) {
            return response()->json([
                'response' => 200,
                'message' => 'Ingreso exitoso',
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ], 200);
        } else {
            // Manejar el caso en que la autenticación falla, por ejemplo, devolver un error 401 no autorizado.
            return response()->json([
                'response' => 401,
                'message' => 'Credenciales incorrectas',
            ], 401);
        }
    }
    // public function register(Request $request){
    //         $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    //     if($validator->fails()){
    //         return response()->json([
    //             'response' => 500,
    //             'message' => 'Error al crear el usuario',
    //             'validations' => $validator->errors()
    //         ], 500);
    //     }
    //     $tercero = Terceros::create([

    //     ]);
    //     $user = User::create([
    //         'name' => $request->get('name'),
    //         'email' => $request->get('email'),
    //         'password' => Hash::make($request->get('password')),
    //     ]);
    //     $token = JWTAuth::fromUser($user);
    //     return response()->json([
    //         'user' => $user,
    //         'token' => $token
    //     ], 200);
    // }
}
