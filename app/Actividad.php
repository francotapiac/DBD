<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    public function reservas(){
    	return $this
    	->belongsToMany('App\Reserva','reserva_actividads','id_actividad','id_reserva')->withTimestamps();
    }

    public function lugars(){
        return $this
        ->belongsToMany('App\Lugar','actividad_lugars','id_actividad','id_lugar')->withTimestamps();
    }

    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_actividads','id_actividad','id_paquete')->withTimestamps(); 
    }
}
