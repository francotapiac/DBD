<?php

use Faker\Generator as Faker;

$factory->define(App\Traslado::class, function (Faker $faker) {
    return [

    	'precio'=> rand(11,10000)/10,
		'capacidad' => $faker->randomElement($array = array(1,2,3,4,10)),
		'compania' => $faker->company,
		'fecha_traslado' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
		'direccion_destino'=> $faker->address,
		'tipo_traslado'=> rand(1,3),
        'id_reserva' => rand(1,40), 
    ];
});
