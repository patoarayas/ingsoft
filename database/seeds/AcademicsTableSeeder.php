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
        /*
        Rellena la taba ACADEMICS con 20 academicos de prueba y los relaciona con
        3 trabajos, usando el esquema dado en el Factory
        */
        factory(App\Academic::class,20)->create();
        factory(App\Academic::class,20)->create()->each(function(App\Academic $academic){
            $academic->works()->attach([
                rand(1,5),
                rand(6,14),
                rand(15,20),
            ]);
        });

    }
}
