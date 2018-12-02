<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    public function asientos(){
   		return $this
   		->belongsToMany('App\Asiento','reserva_vuelos','id_vuelo','id_asiento')->withTimestamps();
    }

    public function escalas(){
   		return $this
   		->belongsToMany('App\Escalas','vuelo_escalas','id_vuelo','id_escala')->withTimestamps();
    }

    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_vuelos','id_vuelo','id_paquete')->withTimestamps(); 
    }

    public function reservas(){
      return $this
      ->belongsToMany('App\Vuelo','reserva_vuelos','id_vuelo','id_reserva')->withTimestamps();
    }


}
