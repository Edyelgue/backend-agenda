<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'medico_id' => $this->faker->numberBetween(1, 5),
            'paciente_id' => $this->faker->numberBetween(1, 5),
            'data_e_hora_agendado' => $this->faker->dateTimeBetween(
                Carbon::now(),
                Carbon::now()->addDays($this->faker->numberBetween(1, 5)),
            ),
        ];
    }
}
