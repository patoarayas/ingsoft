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
            $table->integer('id')->index()->notnullable()->autoincrement();
            $table->string('rut',128)->notnullable();
            $table->string('name',128)->notnullable();
            $table->string('career',128)->notnullable(); //carrera
            $table->string('email',128)->notnullable();
            $table->integer('phone');
            $table->integer('work_id')->notnullable();
            
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
