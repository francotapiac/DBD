<?php

use Faker\Generator as Faker;

$factory->define(App\Vehiculo::class, function (Faker $faker) {
    return [
        'fecha_recogida' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
        'fecha_devolucion' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
        'compania' => $faker->company,
        'precio_diario'=> rand(11,10000)/10,
        'nombre' => $faker->streetName,
        'capacidad' => $faker->randomElement($array = array(2,5,10)),
        'disponibilidad' => $faker->boolean,
        'id_reserva' => rand(1,40), //Ojo, posteriormente deben ser 120
        'id_lugar' => rand(1,20),
    ];
});
