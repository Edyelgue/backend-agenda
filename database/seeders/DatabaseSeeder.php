<?php

namespace Database\Seeders;

use App\Models\Agendamento;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Medico::factory(5)->create();
        Paciente::factory(5)->create();
        Agendamento::factory(5)->create();
    }
}
