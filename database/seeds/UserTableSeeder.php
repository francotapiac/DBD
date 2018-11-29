<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Obtiene datos de rol usuario y admin del modelo Rol (se hace query)
        $rol_user = Rol::where('nombre','usuario')->first();
        $rol_admin = Rol::where('nombre','admin')->first();

        //Se asignan atributos a usuarios
        $user = new User();
        $user->name = "User";
        $user->email = "usuario@email.com";
        $user->password = bcrypt('query'); //Se encripta contraseña
        $user->save(); //se guarda usuario
        //attach relaciona ambos modelos (rol y user)
        //$rol_user solo es una variable (se puede cambiar)
        $user->rols()->attach($rol_user); //Se agrega rol x a usuario

        //Se asignan atributos a usuarios
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@email.com";
        $user->password = bcrypt('query'); //Se encripta contraseña
        $user->save(); //se guarda usuario
        //attach relaciona ambos modelos (rol y user)
        //$rol_admin solo es una variable (se puede cambiar)
        $user->rols()->attach($rol_admin); //Se agrega rol x a usuario



    }
}
