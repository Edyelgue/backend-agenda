<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->only("email", "password");

        try {
            // Tentativa de autenticação
            if (Auth::attempt($credenciais)) {
                $user = $request->user();
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer'
                ], 200); // Status 200 para sucesso
            } else {
                // Retorna resposta caso as credenciais estejam incorretas
                return response()->json([
                    'message' => 'Usuário ou senha inválida.'
                ], 401); // Status 401 para falha de autenticação
            }
        } catch (AuthenticationException $e) {
            // Retorna erro de autenticação personalizado
            return response()->json([
                'message' => 'Erro de autenticação. Por favor, verifique suas credenciais.'
            ], 401);
        } catch (\Exception $e) {
            // Tratamento genérico para outros tipos de exceções
            return response()->json([
                'message' => 'Ocorreu um erro no servidor.'
            ], 500);
        }
    }

    public function logout(Request $request) {}
}
