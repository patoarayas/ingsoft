<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
//con este factory, hacemos que se llenede manera aleatoria con datos para pobrar 
$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'rut'=>$faker->sentence(1),
        'name'=>$faker->name,
        'career'=>$faker->sentence(3),
        'email'=>$faker->unique()->safeEmail,
        'phone'=>rand(1,1000),
        'work_id'=>rand(1,20),
    ];
});
