<?php

namespace Database\Seeders;

use App\Models\PeriodoAcademico; // Asegúrate de que el modelo PeriodoAcademico exista en App\Models
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon; // Importa Carbon para manejar fechas y horas

class PeriodoAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periodos = [];
        $startYear = 2025;
        $endYear = 2030; // Puedes ajustar el año final según tus necesidades

        for ($year = $startYear; $year <= $endYear; $year++) {
            // Periodo I (Marzo - Julio)
            $periodos[] = [
                'nombPeriodo' => $year . '-I',
                'fechaInicio' => Carbon::parse($year . '-03-01'), // 1 de marzo
                'fechaFin' => Carbon::parse($year . '-07-31'),   // 31 de julio
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Periodo II (Agosto - Diciembre)
            $periodos[] = [
                'nombPeriodo' => $year . '-II',
                'fechaInicio' => Carbon::parse($year . '-08-01'), // 1 de agosto
                'fechaFin' => Carbon::parse($year . '-12-31'),   // 31 de diciembre
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        PeriodoAcademico::insert($periodos);
    }
}
