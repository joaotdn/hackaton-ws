<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relato extends Model
{
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
}
