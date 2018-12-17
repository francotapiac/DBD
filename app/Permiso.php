<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
	protected $primaryKey = 'id_permiso';
    protected $fillable = [
        'nombre','descripcion','tipo'
    ]
    public function rols(){
   		return $this
   		->belongsToMany(Rol::class,'rol_permisos','id_permiso','id_rol')->withTimestamps();
    }
}
