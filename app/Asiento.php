<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
	protected $primaryKey = 'id_asiento';
    protected $fillable = [
        'numero_asiento', 'letra_asiento','tipo_asiento','disponibilidad',
    ];
	public function vuelos(){
   		return $this
   		->belongsToMany(Vuelo::class,'reserva_vuelos','id_asiento','id_vuelo')->withTimestamps();
    }
}
