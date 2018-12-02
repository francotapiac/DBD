<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
     public function vuelos()
    {
        return $this->hasMany('App\Vuelo','id_vuelo');
    }
}
