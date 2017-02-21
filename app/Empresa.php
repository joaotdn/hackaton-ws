<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    public function relatos()
    {
        return $this->hasMany('App\Relato');
    }
}
