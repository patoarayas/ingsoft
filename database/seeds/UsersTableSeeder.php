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
            'name'=>'secretaria',
            'email'=>'sectretaria@ucn.cl',
            'password'=>bcrypt('secretaria'),
            'type_user'=>'secretaria',
          
        ]);
    }
}
