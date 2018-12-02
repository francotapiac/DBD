<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    public function vuelos(){
        return $this
        ->belongsToMany('App\Vuelo','paquete_vuelos','id_paquete','id_vuelo')->withTimestamps(); 
    }

    public function vehiculos(){
        return $this
        ->belongsToMany('App\Vehiculo','paquete_vehiculos','id_paquete','id_vehiculo')->withTimestamps(); 
    }

    public function traslados(){
        return $this
        ->belongsToMany('App\Traslado','paquete_traslados','id_paquete','id_traslado')->withTimestamps(); 
    }

    public function actividads(){
        return $this
        ->belongsToMany('App\Actividad','paquete_actividads','id_paquete','id_actividad')->withTimestamps(); 
    }

    public function habitacions(){
        return $this
        ->belongsToMany('App\Habitacion','paquete_habitacions','id_paquete','id_habitacion')->withTimestamps();
    }

    public function reservas(){
        return $this
        ->belongsToMany('App\Reserva','reserva_paquetes','id_paquete','id_reserva')->withTimestamps();
    }

}
