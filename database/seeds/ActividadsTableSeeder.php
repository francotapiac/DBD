<?php

use Illuminate\Database\Seeder;
use App\Actividad;
use App\Lugar;
use Carbon\Carbon;

class ActividadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$lugar_actividad = Lugar::all()->random(1); //Solicita una fila aleatoria de la BD de Lugar
     	$actividad = new Actividad();
     	$actividad->nombre = "Ciclo de Cine Inclusivo";
     	$actividad->descripcion = "Funciones: 4, 5, 6, 24, 25 y 26 de enero | 2019 \n 17:00 horas |                       Microcine, nivel -2 \n ";
     	$actividad->costo = 3200.00;
        $actividad->cantidad = 20;
        $actividad->ninos = true;
        $actividad->fecha_inicio = Carbon::now();
     	$actividad->save(); //Guarda actividad en base de datos
     	$actividad->lugars()->attach($lugar_actividad); //Crea tabla intermedia
     	$actividad->save();

     	$lugar_actividad = Lugar::all()->random(1);
     	$actividad = new Actividad();
     	$actividad->nombre = "Taller de buen trato en aula";
     	$actividad->descripcion = "Taller relacionado a la escucha activa, donde aprenderá a interactuar con sus estudiantes.";
     	$actividad->costo = 2000.00;
        $actividad->cantidad = 2;
        $actividad->ninos = false;
        $actividad->fecha_inicio = Carbon::now();
     	$actividad->save(); 
     	$actividad->lugars()->attach($lugar_actividad);
     	$actividad->save();

    }
}
