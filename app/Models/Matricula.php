<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = ['ciclo','fechaMatricula'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante', 'id');
    }
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'idCarrera', 'id');
    }
    public function detalleMatriculas()
    {
        return $this->hasMany(DetalleMatricula::class, 'idMatricula', 'id');
    }
    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class, 'idPeriodoAcademico', 'id');
    }
}
