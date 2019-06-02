<?php

use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Work::class,20)->create()->each(function(App\Work $work){
            $work->types();
        });
        //crea los seeders y relaciones , ademas de rellenar datos para versiones de prueba
    }
}
