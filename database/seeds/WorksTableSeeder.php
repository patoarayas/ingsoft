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
        /*
            Rellena la tabla WORKS con 20 elementos segun el Factory
         */
        factory(App\Work::class,20)->create()->each(function(App\Work $work){
            $work->type();
        });
        
    }
}
