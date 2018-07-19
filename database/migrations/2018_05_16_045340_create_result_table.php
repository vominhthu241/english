<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('answer_id');
            $table->unsignedInteger('testresult_id');
            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answer')->onDelete('cascade');
            $table->foreign('testresult_id')->references('id')->on('test_result')->onDelete('cascade');
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
        Schema::dropIfExists('result');
    }
}
