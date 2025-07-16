<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEstudiante')->constrained('estudiantes');
            $table->foreignId('idCarrera')->constrained('carreras');
            $table->foreignId('idPeriodoAcademico')->constrained('periodo_academicos');
            $table->integer('ciclo')->default(1);
            $table->date('fechaMatricula')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
