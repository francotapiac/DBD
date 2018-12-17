<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
	protected $primaryKey = 'id_aeropuerto';
	protected $fillable = [
       'nombre_aeropuerto','tipo_aeropuerto', 'numero_contacto' 
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
            return $query->where('tipo_aeropuerto','LIKE',"%$tipo%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeNumero($query, $numero){
        if($numero)
            return $query->where('numero_contacto','LIKE',"%$numero%"); //LIKE permite buscar palabras semejantes (no iguales)
    }
}
