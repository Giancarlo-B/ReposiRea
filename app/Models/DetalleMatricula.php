<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleMatricula extends Model
{
    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'idMatricula', 'id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'idCurso', 'id');
    }
}
