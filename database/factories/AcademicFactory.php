<?php
/*
    Factory para la tabla Academics, declara el esquema para completar
    los campos de cada fila para el Seeder
 */

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

use Freshwork\ChileanBundle\Rut;

$factory->define(App\Academic::class, function (Faker $faker) {

    // Generador de numero aleatorio como base para un rut falso
    $rut = new Rut(rand(1000000, 25000000));

    return [

        'rut'=>$rut->fix()->normalize(),
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
    ];
});
