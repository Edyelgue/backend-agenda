<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AgendamentoController extends Controller
{
    public function index()
    {
        return response()->json(Agendamento::all(), 200);
    }

    public function show($id)
    {
        $agendamento = Agendamento::find($id);

        // Verifica se o agendamento foi encontrado
        if (!$agendamento) {
            return response()->json(
                ['message' => 'Não encontrado'],
                404
            );
        }

        // Retorna o agendamento em formato JSON
        return response()->json($agendamento, 200);
    }

    public function store(Request $request)
    {
        // Verifique se o usuário está autenticado
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Usuario nao autenticado'
            ], 
            401);
        }

        $user_id = Auth::id();

        // Validação dos dados de entrada
        $validated = $request->validate([
            'medico_id' => 'required|exists:medicos,id', // Certifique-se de que 'medico_id' exista na tabela 'medicos'
            'paciente_id' => 'required|exists:pacientes,id', // Certifique-se de que 'paciente_id' exista na tabela 'pacientes'
            'data_e_hora_agendado' => 'required|date|after:now', // Garantir que a data seja válida e futura
        ]);

        // Armazena um novo agendamento
        Agendamento::create([
            'user_id' => $user_id, // O ID do usuário autenticado
            'medico_id' => $validated['medico_id'],
            'paciente_id' => $validated['paciente_id'],
            'data_e_hora_agendado' => $validated['data_e_hora_agendado'],
        ]);

        return response()->json([
            'message' => 'Agendamento criado com sucesso!'
        ], 
        201);
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
