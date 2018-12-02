<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    public function rols(){
   		return $this
   		->belongsToMany('App\Rol','rol_permisos','id_permiso','id_rol')->withTimestamps();
    }
}
