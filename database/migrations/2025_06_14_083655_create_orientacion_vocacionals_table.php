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
            $table->foreignId('idCampoInteres')->constrained('campo_interes')->nullable();
            $table->foreignId('idPostulante')->constrained('postulantes')->nullable();
            $table->dateTime('fechaInicio')->nullable()->default(now());
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
