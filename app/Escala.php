<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    public function vuelos(){
   		return $this
   		->belongsToMany('App\Vuelo','vuelo_escalas','id_escala','id_vuelo')->withTimestamps();
    }

    public function lugar(){
    	return $this
    	//belongsTo donde esta la llave foranea en el MR
    	->belongTo('App\Lugar','id_lugar')->withTimestamps();
    }
}
