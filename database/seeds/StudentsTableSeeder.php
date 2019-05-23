<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class,20)->create()->each(function(App\Student $student){
            $student->work();
        });
        //crea los seeders y relaciones , ademas de rellenar datos para versiones de prueba
    }
}
