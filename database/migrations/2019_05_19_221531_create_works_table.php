<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            //campos tabla works
            $table->increments('id')->index();
            $table->string('title',255);
            $table->enum('status',['INGRESADA','ACEPTADA','FINALIZADA','ANULADA'])->default('INGRESADA');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('name_ext_org',128)->nullable();
            $table->string('tutor_ext_org',128)->nullable();
            $table->integer('cant_students');
            $table->integer('year_reg');
            $table->enum('semester_reg', ['PRIMER','SEGUNDO']); //va a ser 1 o 2
            $table->date('graduation_date')->nullable();
            $table->double('grade')->unsigned()->nullable();
            $table->string('curricular_code')->nullable();
            $table->integer('type_id')->unsigned(); //esta es la clave foranea

            $table->timestamps();

            //relacionamiento de clave foranea;
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
