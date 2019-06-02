<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

use Freshwork\ChileanBundle\Rut;
//con este factory, hacemos que se llenede manera aleatoria con datos para pobrar
$factory->define(App\Academic::class, function (Faker $faker) {

    // Generador de numero aleatorio como base para un rut falso
    $rut = new Rut(rand(1000000, 25000000));

    return [

        'rut'=>$rut->fix()->normalize(),
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
    ];
});
