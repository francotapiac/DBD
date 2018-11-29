<?php

use Illuminate\Database\Seeder;
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
    	//Se crea rol en base de datos
        $rol = new Rol();
        $rol->nombre = "admin";
        $rol->descripcion = "Administrador";
        $rol->save();

        $rol = new Rol();
        $rol->nombre = "usuario";
        $rol->descripcion = "Usuario";
        $rol->save();
    }
}
