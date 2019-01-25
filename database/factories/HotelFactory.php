<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
            'nombre' => $faker->lastName,
            'telefono' => $faker->tollFreePhoneNumber,
            'compania' => $faker->company,
            'calificacion' => rand(1,5),
            'descripcion' => $faker->realText,
            'pais' => $faker->country,
            'ciudad' => $faker->city,
    ];
});
