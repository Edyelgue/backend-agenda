<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Database\QueryException;

class PacienteController extends Controller
{
    public function index()
    {
        // Retorna todos os pacientes
        return response()->json(Paciente::all());
    }

    public function show($id)
    {
        // Exibe um paciente específico
        $paciente = Paciente::find($id);

        // verifica se o paciente foi encontrado
        if (!$paciente) {
            return response()->json(
                [
                    'menssage' => 'Não encontrado!'
                ],
                404
            );
        }

        // Retorna o paciente em formato JSON
        return response()->json($paciente, 200);
    }

    public function store(Request $request)
    {
        // Faz uma busca dos dados a serem cadastrados checando se há duplicidade
        if (Paciente::where(
            'cpf',
            $request->cpf
        )->exists()) {
            return response()->json([
                'error' => 'CPF ja possui cadastro.'
            ], 409);
        }

        if (Paciente::where(
            'rg',
            $request->rg
        )->exists()) {
            return response()->json([
                'error' => 'RG ja possui cadastro.'
            ], 409);
        }

        try {
            // Armazena um novo paciente
            Paciente::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'sexo' => $request->sexo,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'endereco' => $request->endereco,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'historico_medico' => $request->historico_medico
            ]);

            return response(['Paciente cadastrado com sucesso!'], 200);
        } catch (QueryException $e) {

            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        // Atualiza o cadastro de um paciente existente
        $paciente = Paciente::find($request->id);

        $paciente->nome = $request->nome;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->sexo = $request->sexo;
        $paciente->telefone = $request->telefone;
        $paciente->email = $request->email;
        $paciente->endereco = $request->endereco;
        $paciente->cpf = $request->cpf;
        $paciente->rg = $request->rg;
        $paciente->historico_medico = $request->historico_medico;

        $paciente->save();

        return response('Sucesso!', 200);
    }

    public function destroy($id)
    {
        // Remove um paciente específico
        $paciente = Paciente::find($id);
        $paciente->delete();

        return response('Removido!', 200);
    }
}
