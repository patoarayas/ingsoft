<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('rut',128)->unique();
            $table->string('name',128);
            $table->string('email',128)->unique();
            $table->string('phone')->nullable();
            $table->string('career',128)->default('null');
            

            //FK relacion con tabla WORKS
            $table->integer('work_id')->unsigned()->nullable();
               
            
            $table->timestamps();

            //Relacionamiento con tabla WORKS
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
