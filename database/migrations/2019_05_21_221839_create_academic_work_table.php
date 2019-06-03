<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_work', function (Blueprint $table) {

            $table->increments('id');
            //FKs con tablas WORKS y ACADEMICS
            $table->integer('work_id')->unsigned();
            $table->integer('academic_id')->unsigned();

            $table->string('academic_role',128)->nullable();

            $table->timestamps();

            //Relacionamientos con tablas WORKS y ACADEMICS
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('academic_id')->references('id')->on('academics')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_work');
    }
}
