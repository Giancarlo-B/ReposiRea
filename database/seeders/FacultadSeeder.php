<?php

namespace Database\Seeders;
use App\Models\Facultad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Facultad::insert([
            ['nombFacultad' => 'Ingeniería'],
            ['nombFacultad' => 'Ciencias Sociales'],
            ['nombFacultad' => 'Ciencias de la Salud'],
            ['nombFacultad' => 'Administración y Negocios'],
            ['nombFacultad' => 'Arquitectura y Urbanismo'],
            ['nombFacultad' => 'Educación'],
            ['nombFacultad' => 'Derecho y Ciencias Políticas'],
            ['nombFacultad' => 'Ciencias y Humanidades'],
            ['nombFacultad' => 'Tecnologías de la Información'],
            ['nombFacultad' => 'Agronomía y Zootecnia'],
        ]);
    }
}
