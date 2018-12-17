<?php

use Illuminate\Database\Seeder;
use App\Seguro;
class SegurosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seguro= new Seguro();
        $seguro->nombre_seguro = "Accidentes personales";
        $seguro->descripcion = "Seguro de muerte accidental, desmembramiento en transporte común";
        $seguro->precio = 250.00;
        $seguro->save();

        $seguro= new Seguro();
        $seguro->nombre_seguro = "Médicos y dentales";
        $seguro->descripcion = "Emergencia médica, gastos odontológicos, medicamentos recetados, traslado médico, repatriación de restos, viaje de emergencia, gastos de hotel por hospitalización, recuperación médica en hotel, compañero de viaje menor de edad.";
        $seguro->precio = 150.00;
        $seguro->save();

        $seguro= new Seguro();
        $seguro->nombre_seguro = "Cancelación y cambio de viaje";
        $seguro->descripcion = "Retraso de viaje, cancelación de viaje, interrupción de viaje";
        $seguro->precio = 50.00;
        $seguro->save();

        $seguro= new Seguro();
        $seguro->nombre_seguro = "Equipaje y propiedad personal";
        $seguro->descripcion = "Pérdida de equipaje, retraso de equipaje, daño de equipaje, localización
        y seguimiento de equipaje, pérdida o daño a los documentos de viaje";
        $seguro->precio = 100.00;
        $seguro->save();
    }
}
