<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'trackers',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('question_id')->unsigned();
                $table->integer('answer_id')->unsigned();
                $table->boolean('correct');
                $table->integer('user_id')->unsigned();
                $table->foreign('question_id')->references('id')->on('questions');
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('answer_id')->references('id')->on('answers');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackers');
    }
}
