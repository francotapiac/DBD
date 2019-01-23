<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $primaryKey = 'id_actividad';
    protected $fillable = [
        'nombre', 'descripcion', 'costo','cantidad','fecha_inicio','ninos'
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

    //Costo base para pagar
    public function scopeCosto($query, $costo){
        if($costo)
            return $query->where('costo','>=',"$costo"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeLugar($query, $lugar){
        if($lugar)
            //lugar corresponde a la función creada en este modelo
            return $query->whereHas('lugars',function($query) use ($lugar){
                $query->where('pais','LIKE',"%$lugar%")
                    ->orWhere('ciudad','LIKE',"%$lugar%");
        });   
    }

    public function scopeCantidad($query){
            return $query->where('cantidad','>=',1);   
    }

    public function scopeNinos($query,$ninos){
        if($ninos)
            return $query->where('ninos','=',$ninos);   
    }

}
