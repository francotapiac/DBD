<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
    return [

    	'fecha_reserva' => $faker->date,
        'hora_reserva' => $faker->time,
        'detalle_reserva' => $faker->realText,      
        'id_usuario' => rand(1,20),
    ];
});
