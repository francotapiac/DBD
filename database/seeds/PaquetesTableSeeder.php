<?php

use Illuminate\Database\Seeder;

class PaquetesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Paquete::class,20)->create();

        //En cada paquete creado, se asigna una actividad al azar
        factory(App\Paquete::class,20)->create()->each(function($reserva) { //Para cada  reserva
            $reserva->actividads()->attach(App\Actividad::all()->random(1)); //se crea tabla intermedia
        });
    }
}
