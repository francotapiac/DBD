<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
	protected $primaryKey = 'id_escala';
    protected $fillable = [
        'cambio_avion', 'cambio_aeropuerto', 'duracion_escala',
    ];
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
