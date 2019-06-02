<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Freshwork\ChileanBundle\Rut;

//con este factory, hacemos que se llenede manera aleatoria con datos para pobrar
$factory->define(App\Student::class, function (Faker $faker) {

      // Generador de numero para usar como base para rut falso
      $rut = new Rut(rand(1000000, 25000000));

    return [
        'rut'=>$rut->fix()->normalize(),
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
        'phone'=>$faker->e164PhoneNumber(),
        'work_id'=>rand(1,20),
    ];
});
