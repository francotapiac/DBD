<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    public function vuelos(){
   		return $this
   		->belongsToMany('App\Vuelo','vuelo_escalas','id_escala','id_vuelo')->withTimestamps();
    }
}
