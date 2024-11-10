<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'agenda';

    protected $fillable = [
        'user_id',
        'medico_id',
        'paciente_id',
        'data_e_hora_agendado'
    ];
}
