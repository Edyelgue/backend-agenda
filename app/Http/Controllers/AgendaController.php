<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AgendaController extends Controller
{
    public function index()
    {
        return response()->json(Agenda::all(), 200);
    }

    public function show($id)
    {
        $agenda = Agenda::find($id);

        // Verifica se o Agenda foi encontrado
        if (!$agenda) {
            return response()->json(
                ['message' => 'Não encontrado'],
                404
            );
        }

        // Retorna o Agenda em formato JSON
        return response()->json($agenda, 200);
    }

    public function store(Request $request)
    {
        // Verifique se o usuário está autenticado
        if (!Auth::check()) {
            return response()->json(
                [
                    'error' => 'Usuario nao autenticado'
                ],
                401
            );
        }

        $user_id = Auth::id();

        // Validação dos dados de entrada
        $validated = $request->validate([
            'medico_id' => 'required|exists:medicos,id', // Certifique-se de que 'medico_id' exista na tabela 'medicos'
            'paciente_id' => 'required|exists:pacientes,id', // Certifique-se de que 'paciente_id' exista na tabela 'pacientes'
            'data_e_hora_agendado' => 'required|date|after:now', // Garantir que a data seja válida e futura
        ]);

        // Armazena um novo Agenda
        Agenda::create([
            'user_id' => $user_id, // O ID do usuário autenticado
            'medico_id' => $validated['medico_id'],
            'paciente_id' => $validated['paciente_id'],
            'data_e_hora_agendado' => $validated['data_e_hora_agendado'],
        ]);

        return response()->json(
            [
                'message' => 'Agenda criado com sucesso!'
            ],
            201
        );
    }

    public function update(Request $request)
    {
        try {
            $agendamento = Agenda::find($request->id);

            $agendamento->user_id = $request->user_id;
            $agendamento->medico_id = $request->medico_id;
            $agendamento->paciente_id = $request->paciente_id;
            $agendamento->data_e_hora_agendado = $request->data_e_hora_agendado;

            $agendamento->save();

            return response('Sucesso.', 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id) 
    {
        // Remove um agendamento específico
        $agendamento = Agenda::find($id);
        $agendamento->delete();

        return response('Removido.',200);
    }
}
 