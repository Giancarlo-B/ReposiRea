<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $fillable=['nombPeriodo', 'fechaInicio', 'fechaFin'];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'idPeriodoAcademico', 'id');
    }
}
