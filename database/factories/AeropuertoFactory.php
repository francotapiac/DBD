<?php

use Faker\Generator as Faker;

$factory->define(App\Aeropuerto::class, function (Faker $faker) {
    return [
        'nombre_aeropuerto'=> $faker->company,
        'tipo_aeropuerto' => $faker->boolean,
        'numero_contacto' => $faker->phoneNumber,
        'id_lugar'=> rand(1,20),
    ];
});
