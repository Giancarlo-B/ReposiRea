<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'names',
        'apellidos',
        'descripcion',
        'habilidad_destacada',
        'sentimiento_destacado',
        'motivacion',
        'curso_secundaria',
        'interpretacion_final',
        'carreras_intereses',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'carreras_intereses' => 'array', // Crucial para que Laravel maneje el JSON como un array
    ];
}
