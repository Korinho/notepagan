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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Caso::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'usuario_id' 	=> 1,
    	'deudor_id'		=> $faker->numberBetween(1,10),
        'titulo' 		=> $faker->company,
        'adeudo' 		=> $faker->numberBetween(1000,100000),
        'descripcion' 	=> $faker->paragraph,
    ];
});

$factory->define(App\Deudor::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nombre' => $faker->company,
        'tipo'          => 'empresas',
        'total_deudas'  => $faker->numberBetween(10000,1000000),
        'logo'          => $faker->imageUrl(640,480),
    ];
});

$factory->define(App\Archivo::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nombre'  => $faker->company,
        'caso_id' => $faker->numberBetween(1,10),
    ];
});

$factory->define(App\Comentario::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'caso_id'       => $faker->numberBetween(1,40),
        'usuario_id'    => 1,
        'comentario'    => $faker->text(250),
    ];
});

$factory->define(App\Like::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'comentario_id' => $faker->numberBetween(1,100),
        'usuario_id' => $faker->numberBetween(1,1),
    ];
});
