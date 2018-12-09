<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $primaryKey = 'id_actividad';
    protected $fillable = [
        'nombre', 'descripcion', 'costo',
    ];
    public function reservas(){
    	return $this
    	->belongsToMany('App\Reserva','reserva_actividads','id_actividad','id_reserva')->withTimestamps();
    }

    public function lugars(){
        return $this
        ->belongsToMany('App\Lugar','actividad_lugars','id_actividad','id_lugar')->withTimestamps();
    }

    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_actividads','id_actividad','id_paquete')->withTimestamps(); 
    }

    //Scope

    public function scopeNombre($query, $nombre){
        if($nombre)
            return $query->where('nombre','LIKE',"%$nombre%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

     public function scopeDescripcion($query, $descripcion){
        if($descripcion)
            return $query->where('descripcion','LIKE',"%$descripcion%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeCosto($query, $costo){
        if($costo)
            return $query->where('nombre','LIKE',"%$costo%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

}
