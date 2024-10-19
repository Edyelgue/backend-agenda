<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'sexo',
        'telefone',
        'email',
        'endereco',
        'cpf',
        'rg',
        'historico_medico'
    ];
}
