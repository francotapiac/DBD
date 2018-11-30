<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $primaryKey = 'id_lugar';
    protected $fillable = [
        'pais','ciudad','direccion_lugar','codigo_postal', 
    ];
}
