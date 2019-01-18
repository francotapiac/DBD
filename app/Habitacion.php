<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
	protected $primaryKey = 'id_habitacion';
    protected $fillable = [
        'descripcion', 'capacidad', 'precio_noche', 'disponibilidad','fecha_llegada','fecha_salida','id_hotel'
    ];

    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_habitacions','id_habitacion','id_paquete')->withTimestamps();
    }
    //hasmany
    public function reserva(){
    	return $this
    	->belongsToMany(Reserva::class,'id_reserva')->withTimestamps();
    }

    public function hotel(){
        return $this
        ->belongsTo(Hotel::class,'id_hotel')->withTimestamps();
    }

    public function scopeLugar($query,$lugar){



    }
    public function scopeFechaLlegada($query, $fechaLlegada){
        if($fechaLlegada)
            return $query->where('fecha_llegada','>=',"$fechaLlegada"); 
    }

     public function scopeFechaSalida($query, $fechaSalida){
        if($fechaSalida)
            return $query->where('cambio_aeropuerto','<=',"$fechaSalida");
    }

    public function scopeCapacidad($query, $capacidad){
        if($capacidad)
            return $query->where('capacidad','>=',"$capacidad"); 
    }

    public function scopeDisponibilidad($query, $disponibilidad){
        if($disponibilidad)
            return $query->where('disponibilidad','=',"$disponibilidad"); 
    }
}
