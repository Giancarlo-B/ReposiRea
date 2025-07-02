<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrientacionVocacional extends Model
{
    protected $fillable =['habilidadDestacada','motivacion','cursoSecundaria','fechaInicio','fechaFinalizacion','interpretacionFinal','estado'];
    public function campoInteres(){
        return $this->belongsTo(CampoInteres::class,'idCampoInteres','id');
    }
    public function estudiante(){
        return $this->belongsTo(Estudiante::class,'idEstudiante','id');
    }
}
