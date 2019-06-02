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
            //campos tabla students
            $table->increments('id');
            $table->string('rut',9)->unique();
            $table->string('name',128);            
            $table->string('email',128);
            $table->string('phone')->nullable();
            $table->integer('work_id')->unsigned();

            $table->timestamps();

            //relacionamiento con tabla work
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
