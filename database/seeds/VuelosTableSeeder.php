<?php

use Illuminate\Database\Seeder;
use App\Vuelo;

class VuelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vuelo::class,1)->create();
        /*factory(App\Vuelo::class,20)->create()
        ->each(function($asiento) { //Para cada  reserva
            $asiento->asientos()->attach(App\Asiento::all()->random(1)); //se crea tabla intermedia
        });*/

       /* factory(App\Vuelo::class,20)->create()
        ->each(function($seguro) { //Para cada  reserva
            $seguro->seguros()->attach(App\Seguro::all()->random(1)); //se crea tabla intermedia
        });*/

        $vuelo = new Vuelo();
        $vuelo->fecha_ida = "2018-01-25";
        $vuelo->fecha_vuelta = "2018-01-30";
        $vuelo->hora_salida = "10:00:00";
        $vuelo->hora_llegada = "20:00:00";
        $vuelo->duracion_vuelo = 3.30;
        $vuelo->precio = 3.30;
        $vuelo->numero_paradas = 1;
        $vuelo->tipo_vuelo = 1;
        $vuelo->equipaje = 1;
        $vuelo->disponibilidad = 1;
        $vuelo->aerolinea = "Latam"; 
        $vuelo->ciudad_origen = "Santiago";
        $vuelo->pais_origen = "Chile";
        $vuelo->ciudad_destino = "Lima";
        $vuelo->pais_destino = "Perú";
        $vuelo->id_aeropuerto_origen = 1;
        $vuelo->id_aeropuerto_destino = 3;
        $vuelo->save(); //se guarda usuario

        $vuelo = new Vuelo();
        $vuelo->fecha_ida = "2018-01-26";
        $vuelo->fecha_vuelta = "2018-03-30";
        $vuelo->hora_salida = "10:00:00";
        $vuelo->hora_llegada = "20:00:00";
        $vuelo->duracion_vuelo = 10.30;
        $vuelo->precio = 300.30;
        $vuelo->numero_paradas = 4;
        $vuelo->tipo_vuelo = 0;
        $vuelo->equipaje = 3;
        $vuelo->disponibilidad = 1;
        $vuelo->aerolinea = "SKY"; 
        $vuelo->ciudad_origen = "Quito";
        $vuelo->pais_origen = "Ecuador";
        $vuelo->ciudad_destino = "Paris";
        $vuelo->pais_destino = "Francia";
        $vuelo->id_aeropuerto_origen = 1;
        $vuelo->id_aeropuerto_destino = 3;
        $vuelo->save(); //se guarda usuario
        
        factory(App\Vuelo::class,20)->create()
        ->each(function($escala) { //Para cada  reserva
            $escala->escalas()->attach(App\Escala::all()->random(1)); //se crea tabla intermedia
        });
    }
}
