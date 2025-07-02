<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampoInteres extends Model
{
    protected $fillable = ['nombCampoInteres'];
    public function orientacionVocacional()
    {
        return $this->hasMany(OrientacionVocacional::class, 'idCampoInteres');
    }
}
