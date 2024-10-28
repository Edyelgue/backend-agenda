<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return response()->json(User::all());
    }

    // Create User
    public function store(Request $request)
    {
        try {
            // Criação do usuário
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Retorna mensagem de sucesso
            return back()->with('success', 'Usuário criado com sucesso!');
        } catch (\Exception $e) {
            // Tratamento de exceção e retorno de mensagem de erro
            return back()->withErrors(['error' => 'Erro ao criar usuário. Tente novamente.']);
        }
    }
}
