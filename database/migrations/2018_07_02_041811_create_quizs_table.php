<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('quizs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('test_id');
            $table->unsignedInteger('user_id');
            $table->foreign('test_id')->references('id')->on('test');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('date_quiz');
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
        //
        Schema::dropIfExists('quizs');
    }
}
