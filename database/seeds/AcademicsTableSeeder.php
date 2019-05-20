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
    }
}
