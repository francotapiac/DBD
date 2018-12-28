<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $primaryKey = 'id_seguro';
    protected $fillable = [
       'nombre_seguro','descripcion','precio'
    ];

    public function vuelos(){
    	return $this
    	->belongToMany(Vuelo::class,'vuelo_seguros','id_seguro','id_vuelo')->withTimeStaps();
    }
}
