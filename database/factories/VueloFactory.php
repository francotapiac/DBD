<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    return [
        'fecha_ida' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
        'fecha_vuelta' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
        'hora_salida' => $faker->time,
        'hora_llegada' => $faker->time,
        'duracion_vuelo'=> rand(11,10000)/10,
        'precio'=> rand(11,10000)/10,
        'numero_paradas' => rand(1,30),
        'tipo_vuelo' => $faker->boolean,
        'equipaje' => rand(1,5),
        'disponibilidad'=> $faker->boolean,
        'aerolinea'=> $faker->company,

        'id_aeropuerto_origen' => rand(1,20),
        'id_aeropuerto_destino' => rand(1,20),


    ];
});
