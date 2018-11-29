<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rols(){
        return $this
        ->belongsToMany('App\Rol','usuario_rols','id_usuario','id_rol')->withTimestamps(); //user_id, rol_id
    }

    public function autorizarRoles($rols){

        //Método que autoriza acción en rol
        if($this->tieneAlgunRol($rols)){
            return true;
        }
        abort(401,'Esta acción no está autorizada.');
    }

    //Método que comprueba si usuario tiene rol de los muchos que puede tener
    public function tieneAlgunRol($rols){

        if(is_array($rols)){
            foreach($rols as $rol){
                if($this->tieneRol($rol)){
                    return true;
                }
            }
        }
        else{
            if($this->tieneRol($rols)){
                return true;
            }
        }
        return false;
    }

    //Método que verifica si rol ingresado se encuentra en base de datos.
    public function tieneRol($rol){

        if($this->rols()->where('nombre',$rol)->first()){
            return true;
        }
        return false;
    }


}
