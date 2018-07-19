<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakeTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_test', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('test_id');
            $table->unsignedInteger('testresult_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('test')->onDelete('cascade');
            $table->foreign('testresult_id')->references('id')->on('test_result')->onDelete('cascade');
            $table->unsignedInteger('status');
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
        Schema::dropIfExists('take_test');
    }
}
