<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            Rellena la tabla TYPES con 3 elementos segun el Factory
         */
        factory(App\Type::class,3)->create();
    }
}
