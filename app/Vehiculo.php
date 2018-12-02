<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_vehiculos','id_vehiculo','id_paquete')->withTimestamps(); 
    }
}
