<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            //aqui creamos los 5 campos de la tabla
            $table->integer('id')->index()->notnullable()->autoincrement();
            $table->string('activity_name',128)->unique()->notnullable();
            $table->string('students_number',128)->unique()->notnullable();
            $table->integer('duration')->unsigned()->notnullable();
            $table->string('req_external_org',128)->notnullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
