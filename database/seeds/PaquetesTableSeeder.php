<?php

use Illuminate\Database\Seeder;
use App\Paquete;

class PaquetesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paquete = new Paquete();
        $paquete->precio_por_persona = 1000.00;
        $paquete->descripcion = "Paquete vuelo + actividad";
        $paquete->descuento = 50.00;
        $paquete->save(); //se guarda usuario
        //attach relaciona ambos modelos (rol y user)
        //$rol_user solo es una variable (se puede cambiar)
        $paquete->vuelos()->attach(2);
        $paquete->actividads()->attach(1);

        $paquete = new Paquete();
        $paquete->precio_por_persona = 2000.00;
        $paquete->descripcion = "Paquete vuelo + vehiculo";
        $paquete->descuento = 20.00;
        $paquete->save(); //se guarda usuario
        //attach relaciona ambos modelos (rol y user)
        //$rol_user solo es una variable (se puede cambiar)
        $paquete->vuelos()->attach(2);
        $paquete->vehiculos()->attach(1);
       /* factory(App\Paquete::class,20)->create();

        //Para cada servicio, agregar un factory
        factory(App\Paquete::class,20)->create()->each(function($paquete) { //Para cada  reserva
            $paquete->reservas()->attach(App\Reserva::all()->random(1));    //se crea tabla intermedia
        });

        //En cada paquete creado, se asigna una actividad al azar
        factory(App\Paquete::class,20)->create()->each(function($actividad) { //Para cada  actividad
            $actividad->actividads()->attach(App\Actividad::all()->random(1)); //se crea tabla intermedia
        });

        /*factory(App\Paquete::class,20)->create()->each(function($vuelo) { //Para cada  actividad
            $vuelo->vuelos()->attach(App\Vuelo::all()->random(1)); //se crea tabla intermedia
        });*/

      /*  factory(App\Paquete::class,20)->create()->each(function($vehiculo) { //Para cada  actividad
            $vehiculo->vehiculos()->attach(App\Vehiculo::all()->random(1)); //se cr/*ea tabla intermedia
        });

        factory(App\Paquete::class,20)->create()->each(function($traslado) { //Para cada  actividad
            $traslado->traslados()->attach(App\Traslado::all()->random(1)); //se crea tabla intermedia
        });

        factory(App\Paquete::class,20)->create()->each(function($habitacion) { //Para cada  actividad
            $habitacion->habitacions()->attach(App\Habitacion::all()->random(1)); //se crea tabla intermedia
        });

        factory(App\Paquete::class,20)->create()->each(function($vuelo) { //Para cada  actividad
            $vuelo->vuelos()->attach(App\Vuelo::all()->random(1)); //se crea tabla intermedia
        });*/
    }
}
