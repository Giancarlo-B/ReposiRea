<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        Carrera::insert([
            [
                'idFacultad' => 1,
                'nombCarrera' => 'Ingeniería de Sistemas',
                'duracion' => '5 años',
                'precioMatricula' => 1500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 1,
                'nombCarrera' => 'Ingeniería Civil',
                'duracion' => '5 años',
                'precioMatricula' => 1450,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 2,
                'nombCarrera' => 'Sociología',
                'duracion' => '4 años',
                'precioMatricula' => 1100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 2,
                'nombCarrera' => 'Comunicación Social',
                'duracion' => '4 años',
                'precioMatricula' => 1200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 3,
                'nombCarrera' => 'Medicina',
                'duracion' => '7 años',
                'precioMatricula' => 2500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 3,
                'nombCarrera' => 'Enfermería',
                'duracion' => '5 años',
                'precioMatricula' => 1600,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 4,
                'nombCarrera' => 'Administración de Empresas',
                'duracion' => '5 años',
                'precioMatricula' => 1400,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 4,
                'nombCarrera' => 'Contabilidad',
                'duracion' => '5 años',
                'precioMatricula' => 1350,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 5,
                'nombCarrera' => 'Arquitectura',
                'duracion' => '5 años',
                'precioMatricula' => 1700,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 6,
                'nombCarrera' => 'Educación Primaria',
                'duracion' => '5 años',
                'precioMatricula' => 1150,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
