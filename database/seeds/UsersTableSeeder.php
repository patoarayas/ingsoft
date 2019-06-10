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
            'name'=>'Secretaria',
            'email'=>'secretaria@ucn.cl',
            'password'=>bcrypt('secretaria'),
            'role'=>'secretaria',

        ]);

        // TITULACION
        App\User::create([
            'name'=>'Titulación',
            'email'=>'titulacion@ucn.cl',
            'password'=>bcrypt('titulacion'),
            'role'=>'titulacion',
        ]);

        // ACADEMICO
        App\User::create([
            'name'=>'Academico',
            'email'=>'academico@ucn.cl',
            'password'=>bcrypt('academico'),
            'role'=>'academico',
        ]);
    }
}
