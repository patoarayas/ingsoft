<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

//con este factory, hacemos que se llenede manera aleatoria con datos para pobrar 
$factory->define(App\Academic::class, function (Faker $faker) {
    return [
        
        'rut'=>$faker->sentence(8),
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
    ];
});
