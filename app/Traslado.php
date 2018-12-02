<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    public function paquetes(){
        return $this
        ->belongsToMany('App\Paquete','paquete_traslados','id_traslado','id_traslado')->withTimestamps(); 
    }
}
