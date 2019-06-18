<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
            Declara el orden de los llamados a los seeders
         */
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(CareerTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(AcademicsTableSeeder::class);
        

    }
}
