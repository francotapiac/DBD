<?php

use Faker\Generator as Faker;

$factory->define(App\Escala::class, function (Faker $faker) {
    return [
        'cambio_avion' => $faker->boolean,  
        'cambio_aeropuerto'=> $faker->boolean, 
        'duracion_escala' => rand(1,20),
        'id_lugar' => rand(1,20),
    ];
});
