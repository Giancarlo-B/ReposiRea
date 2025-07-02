<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable =['nombres', 'apellidos', 'dni', 'email', 'telefono', 'genero', 'fecha_nacimiento'];
    public function matricula(){
        return $this->hasMany(Matricula::class, 'idEstudiante', 'id');
    }
}
