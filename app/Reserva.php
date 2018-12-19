<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $primaryKey = 'id_reserva';
    protected $fillable = [
        'fecha_reserva','hora_reserva','detalle_reserva','tipo_pago'
    ];


    public function vehiculos(){
        return $this
        ->belongsToMany(Vehiculo::class,'reserva_vehiculos','id_reserva','id_vehiculo')->withTimestamps();
    }

    public function habitacions(){
        return $this
        ->belongsToMany(Habitacion::class,'reserva_habitacions','id_reserva','id_habitacion')->withTimestamps();
    }

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
