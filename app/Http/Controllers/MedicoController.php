<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

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
                ['message' => 'Não encontrado'], 404);
        }

        // Retorna o medico em formato JSON
        return response()->json($medico, 200);
    }

    public function store(Request $request)
    {
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

        return response(['Sucesso!'], 200);
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
