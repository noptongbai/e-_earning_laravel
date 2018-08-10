<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('test', function(Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('student_id');
            $table->bigInteger('subject_id');
            $table->bigInteger('teacher_id');
            $table->bigInteger('score');
            $table->binary('data');
            $table->rememberToken();
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
        Schema::drop('test');
    }

}
