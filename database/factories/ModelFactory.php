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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Relato::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'empresa_id' => function () {
            return factory(App\Empresa::class)->create()->id;
        },
        'emissor' => $faker->name,
        'relato' => $faker->text(250)
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'cpf' => $faker->unique()->numerify('###.###.###-##'),
        'cidade' => $faker->city,
        'estado' => $faker->randomElement(array('Paraíba','Ceará','Alagoas','Maranhão','Bahia','Sergipe','Rio Grande do Norte')),
        'nascimento' => $faker->dateTimeBetween('-30 years','now'),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Empresa::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->unique()->url
    ];
});