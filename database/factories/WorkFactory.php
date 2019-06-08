<?php

/*
    Factory para la tabla Works, declara el esquema para completar
    los campos de cada fila para el Seeder
 */

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
//con este factory, hacemos que se llenede manera aleatoria con datos para pobrar
$factory->define(App\Work::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(1),
        'status'=>$faker->randomElement(['INGRESADA','ACEPTADA','FINALIZADA','ANULADA']),
        'start_date'=>$faker->date,
        'finish_date'=>$faker->date,
        'name_ext_org'=>$faker->sentence(2),
        'tutor_ext_org'=>$faker->sentence(1),
        'cant_students'=>rand(1,4),
        'year_reg'=>$faker->year,
        'semester_reg'=>$faker->randomElement(['PRIMERO','SEGUNDO']),
        'graduation_date'=>$faker->date,
        'grade'=>rand(1,7),
        'curricular_code'=>$faker->sentence(1),
        'type_id'=>rand(1,3),
    ];
});
