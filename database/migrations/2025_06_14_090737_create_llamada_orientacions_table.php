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
        Schema::create('llamada_orientacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idOrientacionVocacional')->constrained('orientacion_vocacionals');
            $table->enum('numLlamada',['1','2','3'])->default('1');
            $table->dateTime('fechaLlamada');
            $table->time('duracionLlamada');
            $table->string('analisis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llamada_orientacions');
    }
};
