<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
	protected $primaryKey = 'id_escala';
    protected $fillable = [
        'cambio_avion', 'cambio_aeropuerto', 'duracion_escala',
    ];
    public function vuelos(){
   		return $this
   		->belongsToMany('App\Vuelo','vuelo_escalas','id_escala','id_vuelo')->withTimestamps();
    }

    public function lugar(){
    	return $this
    	//belongsTo donde esta la llave foranea en el MR
    	->belongTo('App\Lugar','id_lugar')->withTimestamps();
    }

    //Scope

    public function scopeCambioAvion($query, $cambioAvion){
        if($cambioAvion)
            return $query->where('cambio_avion','=',"$cambioAvion"); //LIKE permite buscar palabras semejantes (no iguales)
    }

     public function scopeCambioAeropuerto($query, $cambioAeropuerto){
        if($cambioAeropuerto)
            return $query->where('cambio_aeropuerto','=',"$cambioAeropuerto"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeDuracionEscala($query, $duracionEscala){
        if($duracionEscala)
            return $query->where('duracion_escala','=',"$duracionEscala"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    //Scope que busca nombre de un pais o ciudad en una misma consulta
    public function scopeLugar($query,$lugar){
        if($lugar)
            //lugar corresponde a la función creada en este modelo
            return $query->whereHas('lugar',function($query) use ($lugar){
                $query->where('pais','LIKE',"%$lugar%")
                    ->orWhere('ciudad','LIKE',"%$lugar%");
        });   
    }
}
