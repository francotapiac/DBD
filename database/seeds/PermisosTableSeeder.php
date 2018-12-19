<?php

use Illuminate\Database\Seeder;
use App\Permiso;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              
        $Permiso = new Permiso();
        $Permiso->nombre = "Sin acceso";
        $Permiso->descripcion = "Usuario no tiene permiso indicado";
        $Permiso->tipo = 1;
        $Permiso->save();

        $Permiso = new Permiso();
        $Permiso->nombre = "Solo lectura";
        $Permiso->descripcion = "Usuario solo puede ver área indicada";
        $Permiso->tipo = 2;
        $Permiso->save();

        $Permiso = new Permiso();
        $Permiso->nombre = "Lectura y compra";
        $Permiso->descripcion = "Usuario puede ver área indicada y comprar";
        $Permiso->tipo = 3;
        $Permiso->save();

        $Permiso = new Permiso();
        $Permiso->nombre = "Lectura, compra y obtención de puntos";
        $Permiso->descripcion = "Usuario puede ver área indicada, comprar y obener puntos";
        $Permiso->tipo = 4;
        $Permiso->save();

        $Permiso = new Permiso();
        $Permiso->nombre = "Actualizar, eliminar y crear";
        $Permiso->descripcion = "Usuario puede eliminar una tupla en la BD";
        $Permiso->tipo = 5;
        $Permiso->save();
    }
}
