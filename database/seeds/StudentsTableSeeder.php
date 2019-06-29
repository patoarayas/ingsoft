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
        /*
            Rellena la tabla STUDENTS con 20 elementos segun el Factory
         */
        factory(App\Student::class,20)->create()->each(function(App\Student $student){
            $student->work();
            $student->careers()->attach(rand(1,4));
        });
        
    }
}
