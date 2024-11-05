<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!empty($user)) {
            return response()->json($user);
        } else {
            return response()->json([
                'message' => 'Usuário não encontrado.'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        // Faz uma busca dos dados a serem cadastrados checando se há duplicidade
        if (User::where(
            'name',
            $request->name
        )->exists()) {
            return response()->json([
                'error' => 'Nome ja existe.'
            ], 409);
        }

        if (User::where(
            'email',
            $request->email
        )->exists()) {
            return response()->json([
                'error' => 'Email ja existe.'
            ], 409);
        }

        try {
            // Criação do usuário
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Retorna mensagem de sucesso
            return back()->with(
                'success',
                'Usuário criado com sucesso!'
            );
        } catch (\Exception $e) {
            // Tratamento de exceção e retorno de mensagem de erro
            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        $usuario->save();

        return response('Sucesso.', 200);
    }

    //Fake delete
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        $user->status = $request->status;

        $user->save();

        return response('Removido.', 200);
    }
}
