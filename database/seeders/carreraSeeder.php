<?php

namespace Database\Seeders;

use App\Models\Carrera; // Asegúrate de que el modelo Carrera exista en App\Models
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon; // Importa Carbon para manejar fechas y horas

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de que las facultades con estos IDs existan en tu tabla 'facultads'.
        // Si no existen, o si los IDs son diferentes, ajusta los 'idFacultad' aquí.
        Carrera::insert([
            [
                'idFacultad' => 1, // ID de ejemplo para 'Ingeniería'
                'nombCarrera' => 'Ingeniería de Sistemas',
                'duracion' => '5 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 1, // ID de ejemplo para 'Ingeniería'
                'nombCarrera' => 'Ingeniería Civil',
                'duracion' => '5 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 2, // ID de ejemplo para 'Ciencias Sociales'
                'nombCarrera' => 'Sociología',
                'duracion' => '4 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 2, // ID de ejemplo para 'Ciencias Sociales'
                'nombCarrera' => 'Comunicación Social',
                'duracion' => '4 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 3, // ID de ejemplo para 'Ciencias de la Salud'
                'nombCarrera' => 'Medicina',
                'duracion' => '7 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 3, // ID de ejemplo para 'Ciencias de la Salud'
                'nombCarrera' => 'Enfermería',
                'duracion' => '5 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 4, // ID de ejemplo para 'Administración y Negocios'
                'nombCarrera' => 'Administración de Empresas',
                'duracion' => '5 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 4, // ID de ejemplo para 'Administración y Negocios'
                'nombCarrera' => 'Contabilidad',
                'duracion' => '5 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 5, // ID de ejemplo para 'Arquitectura y Urbanismo'
                'nombCarrera' => 'Arquitectura',
                'duracion' => '5 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'idFacultad' => 6, // ID de ejemplo para 'Educación'
                'nombCarrera' => 'Educación Primaria',
                'duracion' => '5 años',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
