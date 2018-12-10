<?php

use Illuminate\Database\Seeder;
use App\Actividad;
use App\Lugar;

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
     	$actividad->nombre = "Foro";
     	$actividad->descripcion = "Foro donde la gente aprende mucho";
     	$actividad->costo = 3200.00;
     	$actividad->save(); //Guarda actividad en base de datos
     	$actividad->lugars()->attach($lugar_actividad); //Crea tabla intermedia
     	$actividad->save();

     	$lugar_actividad = Lugar::all()->random(1);
     	$actividad = new Actividad();
     	$actividad->nombre = "Feria del libro";
     	$actividad->descripcion = "La 20° Feria del Libro en Ñuñoa, se realizará desde el 7 al 16 de diciembre. ENTRADA LIBERADA";
     	$actividad->costo = 0.00;
     	$actividad->save(); 
     	$actividad->lugars()->attach($lugar_actividad);
     	$actividad->save();

    }
}
