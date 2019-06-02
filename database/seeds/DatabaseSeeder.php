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
       //usaremos este diseño de genrar los seeders, para respetar las relaciones entre tablas
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(AcademicsTableSeeder::class);
        $this->call(CareerTableSeeder::class);

    }
}
