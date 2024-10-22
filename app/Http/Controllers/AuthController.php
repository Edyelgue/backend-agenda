<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AuthController extends Controller
{
    // Autenticação
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email','password');

    //     if (Auth::attempt($credentials)) {
    //         $user = $request->user();
    
    //         $token = $user->createToken('auth_token')->plainTextToken;
    
    //         return response()->json([
    //             "access_token" => $token,
    //             "token_type" => "Bearer"
    //         ]);
    //     }
    
    //     return response()->json([
    //         "message" => "Usuário ou senha inválido!"
    //     ]);
    // }

    public function logout(Request $request)
    {

    }
}
