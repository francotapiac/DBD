<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $primaryKey = 'id_vuelo';
    protected $fillable = [
        'fecha_ida', 'fecha_vuelta', 'hora_salida','hora_llegada','duracion_vuelo','precio','numero_paradas','tipo_vuelo','equipaje','disponibilidad','aerolinea','id_aeropuerto_origen','id_aeropuerto_destino','id_lugar','id_seguro'
    ];

    public function asientos(){
   		return $this
   		->belongsToMany('App\Asiento','vuelo_asientos','id_vuelo','id_asiento')->withTimestamps();
    }

    public function seguros(){
      return $this
      ->belongsToMany(Seguro::class, 'vuelo_seguros','id_vuelo','id_seguro')->withTimestamps();
    }

    public function escalas(){
   		return $this
   		->belongsToMany('App\Escala','vuelo_escalas','id_vuelo','id_escala')->withTimestamps();
    }

    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_vuelos','id_vuelo','id_paquete')->withTimestamps(); 
    }

    public function reservas(){
      return $this
      ->belongsToMany('App\Vuelo','reserva_vuelos','id_vuelo','id_reserva')->withTimestamps();
    }

    public function aeropuertoOrigen(){
      return $this
      ->belongsTo(Aeropuerto::class, 'id_aeropuerto_origen')->withTimestamps();
    }

    public function aeropuertoDestino(){
      return $this
      ->belongsTo(Aeropuerto::class, 'id_aeropuerto_destino')->withTimestamps();
    }


}
