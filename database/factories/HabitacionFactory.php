<?php

use Faker\Generator as Faker;

$factory->define(App\Habitacion::class, function (Faker $faker) {
    return [

        'descripcion' => $faker->realText,
        'capacidad' => $faker->randomElement($array = array(1,2,3,4,5,6,7)),
        'precio_noche'=> rand(11,10000)/10,
        'disponibilidad' => $faker->boolean,
        'fecha_llegada' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
        'fecha_ida' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
    ];
});
