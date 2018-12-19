<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
	protected $primaryKey = 'id_vehiculo';
    protected $fillable = [
        'fecha_recogida', 'fecha_devolucion', 'compañia', 'precio_diario', 'nombre', 'capacidad', 'disponibilidad',
    ];

    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_vehiculos','id_vehiculo','id_paquete')->withTimestamps(); 
    }

    public function lugar(){
    	return $this
    	->belongsTo(Lugar::class,'id_lugar')->withTimestamps();
    }

    public function reservas(){
    	return $this
    	->belongsToMany(Reserva::class,'reserva_vehiculos','id_vehiculo','id_reserva')->withTimestamps();
    }
}
