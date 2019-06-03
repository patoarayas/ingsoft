<?php

/*
    Factory para la tabla Users, declara el esquema para completar
    los campos de cada fila para el Seeder
    No rellena el campo role que por defualt toma el valor de ACADEMICO
    el rol con menos privilegios posibles
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

        'email_verified_at' => now(),
        'remember_token' => Str::random(100),
    ];
});
