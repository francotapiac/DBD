<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
	protected $primaryKey = 'id_vehiculo';
    protected $fillable = [
        'fecha_recogida', 'fecha_devolucion', 'compañia', 'precio_diario', 'nombre', 'capacidad', 'disponibilidad', 'id_lugar','pais','ciudad'
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
    //Scope

    public function scopeFechaRecogida($query, $fecha_recogida){
        if($fecha_recogida)
            return $query->where('fecha_recogida','LIKE',"%$fecha_recogida%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

     public function scopeFechaDevolucion($query, $fecha_devolucion){
        if($fecha_devolucion)
            return $query->where('fecha_devolucion','LIKE',"%$fecha_devolucion%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeCompania($query, $compania){
        if($compania)
            return $query->where('compania','LIKE',"%$compania%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopePrecioDiario($query, $precio_diario){
        if($precio_diario)
            return $query->where('precio_diario','LIKE',"%$precio_diario%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeNombre($query, $nombre){
        if($nombre)
            return $query->where('nombre','LIKE',"%$nombre%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeCapacidad($query, $capacidad){
        if($capacidad)
            return $query->where('capacidad','LIKE',"%$capacidad%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeDisponibilidad($query, $disponibilidad){
        if($disponibilidad)
            return $query->where('disponibilidad','LIKE',"%$disponibilidad%"); //LIKE permite buscar palabras semejantes (no iguales)
    }
    
    public function scopePais($query,$pais){
        if($pais)
            return $this->lugar()->where('pais','LIKE',"%$pais%");
    }

    public function scopeCiudad($query,$ciudad){
        if($ciudad)
            return $this->lugar()->where('ciudad','LIKE',"%$ciudad%");
    }

    public function scopeLugar($query,$ciudad){
        if($ciudad)
            return $query->where('ciudad','LIKE',"%$ciudad%");
    } 
}
