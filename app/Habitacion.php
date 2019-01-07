<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
	protected $primaryKey = 'id_habitacion';
    protected $fillable = [
        'descripcion', 'capacidad', 'precio_noche', 'disponibilidad','fecha_llegada','fecha_salida'
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
}
