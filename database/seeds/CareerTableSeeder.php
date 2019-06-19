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
       App\Career::create([

        'career'=> 'Ingeniería en Computación e Informática'
       ]        
       );

       App\Career::create([

        'career'=> 'Ingeniería Ejecución en Computación e Informática'
       ]        
       );

       App\Career::create([

        'career'=> 'Ingeniería Civil en Computación e Informática (Malla-Nueva)'
       ]        
       );

       App\Career::create([

        'career'=> 'Ingeniería Civil en Computación e Informática (Malla-Antigua)'
       ]        
       );
    }
}
