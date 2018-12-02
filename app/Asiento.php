<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
	public function vuelos(){
   		return $this
   		->belongsToMany('App\Vuelo','reserva_vuelos','id_asiento','id_vuelo')->withTimestamps();
    }
}
