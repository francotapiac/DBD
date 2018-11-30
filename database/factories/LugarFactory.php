<?php

use Faker\Generator as Faker;

$factory->define(App\Lugar::class, function (Faker $faker) {
    return [
        //
        'pais' => $faker->country,
        'ciudad' => $faker->city,
        'direccion_lugar' => $faker->address,
        'codigo_postal' => $faker->postcode
    ];
});
