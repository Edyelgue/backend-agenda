<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'data_nascimento' => $this->faker->date(
                Carbon::createFromFormat(
                    'Y-m-d',
                    $this->faker->date()
                )
            ),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail,
            'endereco' => $this->faker->address,
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'rg' => $this->faker->numerify('##.###.###'),
            'historico_medico' => $this->faker->text(200)
        ];
    }
}
