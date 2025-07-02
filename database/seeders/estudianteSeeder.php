<?php

namespace Database\Seeders;
use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class estudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Estudiante::create([
                'nombres' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'fechaNacimiento' => $faker->date('Y-m-d', '-18 years'),
                'genero' => $faker->randomElement(['M', 'F']),
                'dni' => $faker->unique()->numerify('########'),
                'email' => $faker->unique()->safeEmail,
                'telefono' => $faker->phoneNumber,
            ]);
        }
    }
}
