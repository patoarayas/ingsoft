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
        /*
            Rellena la tabla USERS con 19 elementos segun el Factory
         */
        factory(App\User::class,19)->create();

        /*
        Se deben declarar los usuarios especiales que se usaran para probar
        la pagina
        */
        
        // SECRETARIA
        App\User::create([
            'name'=>'secretaria',
            'email'=>'secretaria@ucn.cl',
            'password'=>bcrypt('secretaria'),
            'role'=>'secretaria',

        ]);
    }
}
