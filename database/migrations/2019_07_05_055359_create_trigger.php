<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared("
        CREATE TRIGGER asignar_fechas BEFORE INSERT ON works FOR EACH ROW

        BEGIN
          SET NEW.year_reg = YEAR(NEW.created_at);
          IF MONTH(NEW.created_at) < 8 THEN
             SET NEW.semester_reg = 'PRIMERO';
          ELSE
             SET NEW.semester_reg= 'SEGUNDO';
          END IF;

          END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `asignar_fechas`');

    }
}
/*
BEGIN
  SET NEW.year_reg = YEAR(NEW.created_at);
  IF MONTH(NEW.created_at < 8) THEN
     SET NEW.semester_reg = 'PRIMERO';
  ELSE
     SET NEW.semester_reg= 'SEGUNDO';
  END IF;

  END*/
