<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_habitacions','id_habitacion','id_paquete')->withTimestamps();
    }
}
