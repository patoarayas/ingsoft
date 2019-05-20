<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,19)->create();
        //creo mi usuario admin 
        App\User::create([
            'name'=>'Alvaro Lucas Castillo Calabacero',
            'email'=>'alvaro.castillo@alumnos.ucn.cl',
            'password'=>bcrypt('cacadeburr0'),
            'type_user'=>'root',
          
        ]);
    }
}
