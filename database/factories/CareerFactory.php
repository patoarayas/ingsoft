<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Career::class, function (Faker $faker) {
    return [
        //
        'career'=>$faker->sentence(4),
        'students_id'=>rand(1,20),
    ];
});
