<?php

namespace Database\Seeders;
use App\Models\CampoInteres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class campoInteresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CampoInteres::insert([
            ['nombCampoInteres' => 'Tecnología'],
            ['nombCampoInteres' => 'Salud'],
            ['nombCampoInteres' => 'Educación'],
            ['nombCampoInteres' => 'Derecho'],
            ['nombCampoInteres' => 'Negocios'],
            ['nombCampoInteres' => 'Ingeniería'],
            ['nombCampoInteres' => 'Arte y Diseño'],
            ['nombCampoInteres' => 'Ciencias Naturales'],
        ]);
    }
}
