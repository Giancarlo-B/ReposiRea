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
        Schema::create('periodo_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombPeriodo', 100)->unique();
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodo_academicos');
    }
};
