<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // Campo que será a chave estrangeira
                  ->constrained('users'); // Tabela referenciada
            $table->foreignId('medico_id') // Campo que será a chave estrangeira
                  ->constrained('medicos'); // Tabela referenciada
            $table->foreignId('paciente_id') // Campo que será a chave estrangeira
                  ->constrained('pacientes'); // Tabela referenciada
            $table->dateTime('data_e_hora_agendado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
