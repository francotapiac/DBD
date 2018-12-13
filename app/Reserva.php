<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $primaryKey = 'id_reserva';
    public function actividads(){
    	return $this
    	->belongsToMany('App\Actividad','reserva_actividads','id_reserva','id_actividad')->withTimestamps();
    }

    public function vuelos(){
    	return $this
    	->belongsToMany('App\Vuelo','reserva_vuelos','id_reserva','id_vuelo')->withTimestamps();
    }

    public function paquetes(){
    	return $this
    	->belongsToMany('App\Paquete','reserva_paquetes','id_reserva','id_paquete')->withTimestamps();
    }

    public function traslados(){
        return $this
        ->hasMany('App\Traslado','id_traslado')->withTimestamps();
    }


}
