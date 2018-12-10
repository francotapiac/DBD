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
        $user->primer_nombre = "User";
        $user->segundo_nombre = "User";
        $user->primer_apellido = "User";
        $user->segundo_apellido = "User";
        $user->email = "user@user.user";
        $user->fecha_nacimiento = "2016-01-01 00:00:00";
        $user->edad = 1234;
        $user->ciudad_residencia = "santiago";
        $user->calle_residencia = "cale falsa 1234";
        $user->pais_residencia = "santiago";
        $user->password = bcrypt('usuario'); //Se encripta contraseña
        $user->numero_celular = "+56-999999999";
        $user->tipo_documento = true;
        $user->tipo_pago = 1;
        $user->estado = false;
        $user->save(); //se guarda usuario
        //attach relaciona ambos modelos (rol y user)
        //$rol_user solo es una variable (se puede cambiar)
        $user->rols()->attach($rol_user); //Se agrega rol x a usuario

        //Se asignan atributos a usuarios
        $user = new User();
        $user->primer_nombre = "Admin";
        $user->segundo_nombre = "Admin";
        $user->primer_apellido = "Admin";
        $user->segundo_apellido = "Admin";
        $user->email = "admin@admin.admin";
        $user->fecha_nacimiento = "2016-01-01 00:00:00";
        $user->edad = 123;
        $user->ciudad_residencia = "santiago";
        $user->calle_residencia = "cale falsa 12345";
        $user->pais_residencia = "santiago";
        $user->password = bcrypt('admin'); //Se encripta contraseña
        $user->numero_celular = "+56-898989898";
        $user->tipo_documento = true;
        $user->tipo_pago = 1;
        $user->estado = false;
        $user->save(); //se guarda usuario
        //attach relaciona ambos modelos (rol y user)
        //$rol_admin solo es una variable (se puede cambiar)
        $user->rols()->attach($rol_admin); //Se agrega rol x a usuario

        //Creación usuarios con roles al azar
        factory(App\User::class,18)->create()->each(function($rol) { //Para cada  usuario
            $rol->rols()->attach(App\Rol::all()->random(1));
        });;
        
    }
}
