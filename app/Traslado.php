<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//se lee "una clase" tiene:
//en este caso : un traslado tiene
class Traslado extends Model
{
    protected $primaryKey = 'id_traslado';
    protected $fillable = [
        'precio','capacidad','compañia','fecha_traslado','direccion_destino','tipo_traslado'
    ];   
	//puede estar en muchos paquetes
    public function paquetes(){
        return $this
        ->belongsToMany(Paquete::class,'paquete_traslados','id_traslado','id_paquete')->withTimestamps(); 
    }
    //una reserva
    public function reserva(){
    	return $this
    	->belongsTo(Reserva::class,'id_reserva')->withTimestamps();
    }

}
