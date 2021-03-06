<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

	protected $primaryKey = 'id_rol';
    protected $fillable = [
        'nombre','descripcion'
    ];
    public function users(){
    	//segundo parametro se pone con el fin de evitar la convención de nombre rol_users (se ordena de forma alfabetica)->tabla pivot
    	//tercer parametro evita convención de nombre atributo rol_id, para poner nombre designado en migración de tabla intermedia
    	//cuarto parametro evita convención de nombre atributo user_id, para poner nombre designado en migración de tabla intermedia
    	//Todo sirve para hacer un query funcional.
    	return $this
    	->belongsToMany(User::class,'usuario_rols','id_rol','id_usuario')->withTimestamps();
    }

    public function permisos(){
   		return $this
   		->belongsToMany(Permiso::class,'rol_permisos','id_rol','id_permiso')->withTimestamps();
    }
}
