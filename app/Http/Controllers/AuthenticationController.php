<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginFormRequest $request)
    {
        $login = [
            'email' => $request->email, 
            'password' => $request->password
        ];

        if(Auth::attempt($login, false)){
            return response()->json("Inicio de sesión correcto", 200);
        } else {
            return response()->json(['errors' => [
                'login' => ['Los datos que has ingresado son incorrectos']
            ]], 422);
        }
    }

    public function auth(){
        return Auth::user();
    }
}
