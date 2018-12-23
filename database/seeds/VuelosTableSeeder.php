<?php

use Illuminate\Database\Seeder;

class VuelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vuelo::class,20)->create()
        ->each(function($asiento) { //Para cada  reserva
            $asiento->asientos()->attach(App\Asiento::all()->random(1)); //se crea tabla intermedia
        });

        factory(App\Vuelo::class,20)->create()
        ->each(function($seguro) { //Para cada  reserva
            $seguro->seguros()->attach(App\Seguro::all()->random(1)); //se crea tabla intermedia
        });

        factory(App\Vuelo::class,20)->create()
        ->each(function($escala) { //Para cada  reserva
            $escala->escalas()->attach(App\Escala::all()->random(1)); //se crea tabla intermedia
        });
    }
}
