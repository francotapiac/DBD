<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $primaryKey = 'id_historial';
    protected $fillable = [
        'descripcion', 'accion', 'fecha_accion','hora_accion'
    ];

    public function usuarios(){
    	return $this
        ->hasMany(User::class)->withTimestamps();
    }
}
