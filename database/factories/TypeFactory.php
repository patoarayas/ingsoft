<?php

/*
    Factory para la tabla Type, declara el esquema para completar
    los campos de cada fila para el Seeder
 */

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Type::class, function (Faker $faker) {
    return [
        'activity_name'=>$faker->sentence(4),
        'max_students'=>rand(1,4),
        'duration'=>rand(1,3),
        'req_external_org'=>$faker->boolean(),
    ];
});
