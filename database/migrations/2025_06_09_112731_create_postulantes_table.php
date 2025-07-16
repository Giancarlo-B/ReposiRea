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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('apellidos');
            $table->text('descripcion');
            $table->string('habilidad_destacada');
            $table->string('sentimiento_destacado');
            $table->string('motivacion');
            $table->string('curso_secundaria');
            $table->text('interpretacion_final');
            $table->json('carreras_intereses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulantes');
    }
};
