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
        $this->call(UsersTableSeeder::class);
        $this->call(AcademicsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
    }
}
