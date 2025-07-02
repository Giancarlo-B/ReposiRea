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
        Schema::create('orientacion_vocacionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCampoInteres')->constrained('campo_interes');
            $table->foreignId('idEstudiante')->constrained('estudiantes');
            $table->string('habilidadDestacada');
            $table->string('motivacion');
            $table->string('cursoSecundaria');
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFinalizacion');
            $table->string('interpretacionFinal');
            $table->enum('estado', ['E', 'F'])->default('E');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orientacion_vocacionals');
    }
};
