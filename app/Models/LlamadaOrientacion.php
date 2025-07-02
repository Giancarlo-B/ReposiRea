<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LlamadaOrientacion extends Model
{
    protected $fillable = ['numLlamada','fechaLlamada','duracion','analisis'];
    public function orientacionVocacional(){
        return $this->belongsTo(OrientacionVocacional::class,'idOrientacionVocacional','id');
    }
}
