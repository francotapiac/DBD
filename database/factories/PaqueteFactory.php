<?php

use Faker\Generator as Faker;

$factory->define(App\Paquete::class, function (Faker $faker) {
    return [
        'precio_por_persona' => rand(10,10000)/10, 
        'descripcion'=> $faker->realText, 
        'descuento' => rand(10,10000)/10, 
    ];
});
