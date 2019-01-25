<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
	protected $primaryKey = 'id_asiento';
    protected $fillable = [
        'numero_asiento', 'letra_asiento','tipo_asiento','disponibilidad','id_vuelo'
    ];
	public function vuelo(){
   		return $this
   		->belongsTo(Vuelo::class,'reserva_vuelos','id_asiento','id_vuelo')->withTimestamps();
    }

    //Scope

    public function scopeNumeroAsiento($query, $numero){
        if($numero)
            return $query->where('numero_asiento','=',"$numero"); //LIKE permite buscar palabras semejantes (no iguales)
    }

     public function scopeLetraAsiento($query, $letra){
        if($letra)
            return $query->where('letra_asiento','LIKE',"%$letra%"); //LIKE permite buscar palabras semejantes (no iguales)
    }

    public function scopeTipoAsiento($query, $tipo){
        if($tipo)
            return $query->where('tipo_asiento','=',"$tipo"); //= permite comparar enteros
    }

    public function scopeDisponibilidad($query){
        if($disponibilidad)
            return $query->where('disponibilidad','=',true); 
    }
}
