<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'primer_nombre' => $faker->firstName,
        'segundo_nombre' => $faker->firstName,
        'primer_apellido' => $faker->lastName,
        'segundo_apellido' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'fecha_nacimiento' => $faker->date,
        'edad' =>rand(18,100),
        'ciudad_residencia' => $faker->city,
        'calle_residencia' => $faker->address,
        'pais_residencia' => $faker->country,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'numero_celular' => $faker->phoneNumber,
        'tipo_documento' =>rand(1,2),
        'tipo_pago' => rand(1,2),
        'estado' => rand(1,2),
        'remember_token' => str_random(20),
    ];
});
