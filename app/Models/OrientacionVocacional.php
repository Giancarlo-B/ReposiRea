<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrientacionVocacional extends Model
{
    protected $fillable =['fechaInicio'];
    public function campoInteres(){
        return $this->belongsTo(CampoInteres::class,'idCampoInteres','id');
    }
    public function postulante(){
        return $this->belongsTo(Postulante::class,'idPostulante','id');
    }
}
