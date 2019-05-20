<?php

use Illuminate\Database\Seeder;

class AcademicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Academic::class,20)->create();
        factory(App\Academic::class,20)->create()->each(function(App\Academic $academic){
            $academic->works()->attach([
                rand(1,5),
                rand(6,14),
                rand(15,20),
            ]);
        });
        //crea los seeders y relaciones , ademas de rellenar datos para versiones de prueba
    }
}
