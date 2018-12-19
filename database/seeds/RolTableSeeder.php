<?php

use Illuminate\Database\Seeder;
use App\Permiso;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_1 = Permiso::where('tipo','1')->first();
        $rol_2 = Permiso::where('tipo','2')->first();
        $rol_3 = Permiso::where('tipo','3')->first();
        $rol_4 = Permiso::where('tipo','4')->first();
        $rol_5 = Permiso::where('tipo','5')->first();

    	//Se crea rol en base de datos
        $rol = new Rol();
        $rol->nombre = "admin";
        $rol->descripcion = "Administrador";
        $rol->save();
        $rol->permisos()->attach($rol_5); 

        $rol = new Rol();
        $rol->nombre = "cliente";
        $rol->descripcion = "Cliente que puede obtener puntos";
        $rol->save();
        $rol->permisos()->attach($rol_4); 

        $rol = new Rol();
        $rol->nombre = "usuario";
        $rol->descripcion = "Usuario";
        $rol->save();
        $rol->permisos()->attach($rol_3);
    }
}
