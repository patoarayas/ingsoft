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

    $status = $faker->randomElement(['INGRESADA','ACEPTADA','FINALIZADA','ANULADA']);
    $grad_date = NULL;
    $grade = NULL;
    $curr_code = NULL;

    if($status == 'ACEPTADA'){
        $curr_code = $faker->optional()->bothify('CC##??');
    }
    if($status =='FINALIZADA'){
        $grad_date = $faker->date;
        $grade = $faker->randomFloat(2,1,7);
        $curr_code = $faker->bothify('CC##??');
    }


    return [
        'title'=>$faker->sentence(1),
        'status'=>$status,
        'start_date'=>$faker->date,
        'finish_date'=>$faker->date,
        'name_ext_org'=>$faker->sentence(2),
        'tutor_ext_org'=>$faker->sentence(1),
        'cant_students'=>rand(1,4),
        'year_reg'=>$faker->year,
        'semester_reg'=>$faker->randomElement(['PRIMERO','SEGUNDO']),
        'graduation_date'=>$grad_date,
        'grade'=>$grade,
        'curricular_code'=>$curr_code,
        'type_id'=>rand(1,3),
    ];
});
