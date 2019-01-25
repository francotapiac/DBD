<?php

use Faker\Generator as Faker;

$factory->define(App\Asiento::class, function (Faker $faker) {
    return [
    	//hasta el momento repite los asientos
        'numero_asiento' => rand(1,50),
        'letra_asiento' => $faker->randomElement($array = array ('A','B','C','D','E','F','G','H')),
        'tipo_asiento' => rand(1,3),
        'disponibilidad' => $faker->boolean,
        'id_vuelo' => rand(1,23),
    ];
});
