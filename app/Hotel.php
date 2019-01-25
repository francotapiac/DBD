<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'id_hotel';
    protected $fillable = [
        'nombre','telefono','compañia','calificacion','descripcion','ciudad','pais'
    ];

    public function habitacions(){
    	return $this
    	->hasMany(Habitacion::class,'id_habitacion')->withTimeStaps();
    }

    public function lugar(){
    	return $this
    	->hasOne(Lugar::class,'id_lugar')->withTimeStaps();
    }

    public function scopeLugar($query, $pais){

        if($pais)
            return $query->where('pais','LIKE',"%$pais%"); 
    }

    
}
