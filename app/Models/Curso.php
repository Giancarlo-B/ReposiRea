<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable=['nombCurso','ciclo','creditos'];
    public function carrera(){
        return $this->belongsTo(Carrera::class, foreignKey: 'idCarrera', ownerKey: 'id');
    }
}
