<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'dni' => $this->faker->unique()->numerify('########'),
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'genero' => $this->faker->randomElement(['M', 'F']),
            'fechaNacimiento' => $this->faker->date('Y-m-d', '-18 years'),
        ];
    }
}
