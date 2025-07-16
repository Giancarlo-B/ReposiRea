<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //PARA DESACTIVAR LOS TIMESTAMPS SEGUN LA TABLA DE MIGRACIONES
    //public $timestamps = false;
    protected $fillable = ['nombCarrera','duracion','precioMatricula'];
        public function facultad()
    {
        return $this->belongsTo(Facultad::class, foreignKey: 'idFacultad', ownerKey: 'id');
    }
}
