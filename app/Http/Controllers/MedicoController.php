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
}
