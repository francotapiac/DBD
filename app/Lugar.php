<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $primaryKey = 'id_lugar';
    protected $fillable = [
        'pais','ciudad','direccion_lugar','codigo_postal', 
    ];

    public function actividads(){
        return $this
        ->belongsToMany('App\Actividad','actividad_lugars','id_lugar','id_actividad')->withTimestamps(); //user_id, rol_id
    }

    public function aeropuertos(){
    	return $this->hasOne(Aeropuerto::class, 'id_aeropuerto');
    }

    public function vehiculos(){
        return $this->hasMany(Vehiculos::class, 'id_vehiculo');
    }

    public function hotel(){
        return $this->hasOne(Hotel::class, 'id_hotel');
    }


    public function escalas(){
    	return $this
    	//hasMany el que no la tiene en el MR
    	->hasMany('App\Escala','id_escala')->withTimestamps();
    }

    //Funciones de lugar

    public function buscarLugar($pais,$ciudad){
        return $this->where('pais',"$pais")
                    ->where('ciudad',"$ciudad");
    }
}
