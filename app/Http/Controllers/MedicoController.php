<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use Illuminate\Database\QueryException;

class MedicoController extends Controller
{
    public function index()
    {
        // Retorna todos os médicos no formato JSON
        return response()->json(Medico::all(), 200);
    }

    public function show($id)
    {
        // Exibe um medico específico
        // Busca o medico pelo ID
        $medico = Medico::find($id);

        // Verifica se o medico foi encontrado
        if (!$medico) {
            return response()->json(
                ['message' => 'Não encontrado'],
                404
            );
        }

        // Retorna o medico em formato JSON
        return response()->json($medico, 200);
    }

    public function store(Request $request)
    {

        // Faz um busca dos dados a serem cadastrados checando se há duplicidade
        if (Medico::where(
            'crm',
            $request->crm
        )->exists()) {
            return response()->json([
                'error' => 'CRM ja possui cadastro.'
            ], 409);
        }

        if (Medico::where(
            'telefone',
            $request->telefone
        )->exists()) {
            return response()->json([
                'error' => 'Telefone ja possui cadastro.'
            ], 409);
        }

        if (Medico::where(
            'email',
            $request->email
        )->exists()) {
            return response()->json([
                'error' => 'E-mail ja possui cadastro.'
            ], 409);
        }

        try {

            // Armazena um novo medico
            Medico::create([
                'nome' => $request->nome,
                'crm' => $request->crm,
                'especialidade' => $request->especialidade,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'endereco' => $request->endereco,
                'status' => '1',
                'obs' => $request->obs
            ]);

            return response(['message' => 'Medico cadastrado com sucesso!'], 200);

        } catch (QueryException $e) {

            // Para qualquer outro tipo de erro, retorna uma mensagem genérica
            return response()->json(['error' => 'Erro ao cadastrar medico.'], 500);

        }
    }

    public function update(Request $request)
    {
        // Atualiza um medico existente
        $medico = Medico::find($request->id);

        $medico->nome = $request->nome;
        $medico->crm = $request->crm;
        $medico->especialidade = $request->especialidade;
        $medico->telefone = $request->telefone;
        $medico->email = $request->email;
        $medico->endereco = $request->endereco;
        $medico->status = $request->status;
        $medico->obs = $request->obs;

        $medico->save();

        return response('Sucesso!', 200);
    }

    public function destroy($id)
    {
        // Remove um medico específico
        $medico = Medico::find($id);
        $medico->delete();

        return response('Removido!', 200);
    }
}
