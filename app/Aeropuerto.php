<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
	protected $primaryKey = 'id_aeropuerto';
	protected $fillable = [
       'nombre_aeropuerto','tipo_aeropuerto', 'numero_contacto', 'id_lugar' 
    ];


     public function vuelos()
    {
        return $this->hasMany('App\Vuelo','id_vuelo');   
    }

    public function lugar(){

    	return $this->hasOne(Lugar::class,'id_lugar');
    }

    //Scope

    public function scopeNombre($query, $nombre){
        if($nombre)
            return $query->where('nombre_aeropuerto','LIKE',"%$nombre%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

     public function scopeTipo($query, $tipo){
        if($tipo)
            return $query->where('tipo_aeropuerto','=',"$tipo"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeNumero($query, $numero){
        if($numero)
            return $query->where('numero_contacto','LIKE',"%$numero%"); //LIKE permite buscar palabras semejantes (no iguales)
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
