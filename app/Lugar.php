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
}
