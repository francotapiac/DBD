<?php

use Illuminate\Database\Seeder;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Para cada servicio, agregar un factory
        factory(App\Reserva::class,20)->create()->each(function($reserva) { //Para cada  reserva
            $reserva->actividads()->attach(App\Actividad::all()->random(1)); //se crea tabla intermedia
        });

        //Para cada servicio, agregar un factory
        factory(App\Reserva::class,20)->create()->each(function($reserva) { //Para cada  reserva
            $reserva->paquetes()->attach(App\Paquete::all()->random(1));    //se crea tabla intermedia
        });
    }
}
