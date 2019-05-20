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
            $table->string('title',128)->notnullable();
            $table->enum('status',['INGRESADA','ACEPTADA','FINALIZADA','ANULADA'])->default('INGRESADA');
            $table->date('start_date')->notnullable();
            $table->date('finish_date')->notnullable();            
            $table->string('name_ext_org',128);
            $table->string('tutor_ext_org',128);
            $table->integer('students_number')->notnullable();
            $table->integer('year_reg')->notnullable();//puede ser year en vez de interger pero se maneja mejor como int
            $table->integer('semester_reg')->notnullable(); //va a ser 1 o 2 
            $table->date('certification_date')->notnull();
            $table->double('qualification')->unsigned()->notnullable();
            $table->string('curricular_code')->notnullable();
            $table->integer('type_id')->unsigned(); //esta es mi clave foranea
            
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
