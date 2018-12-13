<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//se lee "una clase" tiene:
//en este caso : un traslado tiene
class Traslado extends Model
{
	//puede estar en muchos paquetes
    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_traslados','id_traslado','id_traslado')->withTimestamps(); 
    }
    //una reserva
    public function reserva(){
    	return $this
    	->belongTo('App\Reserva','id_traslado')->withTimestamps();
    }

}
