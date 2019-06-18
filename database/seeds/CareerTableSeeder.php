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

        'career'=> 'IenCI'
       ]        
       );

       App\Career::create([

        'career'=> 'IECI'
       ]        
       );

       App\Career::create([

        'career'=> 'ICCI'
       ]        
       );

       App\Career::create([

        'career'=> 'ICCIV' //malla vieja de civil
       ]        
       );
    }
}
