<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'data_nascimento' => $this->faker->date('d/m/Y', '01/01/2000'),
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
