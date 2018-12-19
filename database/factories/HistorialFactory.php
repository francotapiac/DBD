<?php

use Faker\Generator as Faker;

$factory->define(App\Historial::class, function (Faker $faker) {
    return [
            'descripcion' => $faker->realText,
            'accion' => $faker->text(64),
            'fecha_accion' => $faker->dateTime,
            'hora_accion' => $faker->time,
    ];
});
