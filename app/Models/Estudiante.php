<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable =['nombres', 'apellidos', 'dni', 'email', 'telefono', 'genero', 'fechaNacimiento'];
    public function matricula(){
        return $this->hasMany(Matricula::class, 'idEstudiante', 'id');
    }
}
