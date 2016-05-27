<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\propietario::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->userName,
        'email' => $faker->safeEmail,
        'telefono'=> $faker->phoneNumber,
        'user_id'=> factory(App\User::class)->create()->id,
    ];
});

$factory->define(App\Models\cabanas::class, function (Faker\Generator $faker) {
    return [
        'nombre'=> $faker->lastName,
        'descripcion'=> $faker->sentence(),
        'direccion'=> $faker->address,
        'precio'=> $faker->numberBetween(1,1000),
        'propietario_id'=>factory(App\Models\propietario::class)->create()->id,
        'publicar'=>1,
        ];
});

