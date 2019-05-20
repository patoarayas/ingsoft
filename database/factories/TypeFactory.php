<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
//con este factory, hacemos que se llenede manera aleatoria con datos para pobrar 
$factory->define(App\Type::class, function (Faker $faker) {
    return [
        'activity_name'=>$faker->sentence(4),
        'students_number'=>rand(1,4),
        'duration'=>rand(1,3),
        'req_external_org'=>$faker->randomElement(['SI','NO']),
    ];
});
