<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'id_hotel';
    protected $fillable = [
        'nombre','telefono','compañia','calificacion','descripcion'
    ];

    public function habitacions(){
    	return $this
    	->hasMany(Habitacion::class,'id_habitacion')->withTimeStaps();
    }

    public function lugar(){
    	return $this
    	->hasOne(Lugar::class,'id_lugar')->withTimeStaps();
    }
    
}
