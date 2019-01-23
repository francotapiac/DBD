<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
    return [

    	'fecha_reserva' => $faker->date,
        'hora_reserva' => $faker->time,
        'detalle_reserva' => $faker->realText,     
        'tipo_pago' => rand(1,3), 
        'id_usuario' => rand(1,20),
        'pago_actual' => $faker->numberBetween(100,200),
        'reserva_realizada' => "actividad",

    ];
});
