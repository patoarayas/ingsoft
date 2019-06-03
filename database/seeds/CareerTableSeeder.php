<?php

use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            Rellena la tabla CAREER con 22 carrers segun el Factory
         */
        factory(App\Career::class,22)->create();
    }
}
