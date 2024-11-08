<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medico_id',
        'paciente_id',
        'data_e_hora_agendado'
    ];
}
