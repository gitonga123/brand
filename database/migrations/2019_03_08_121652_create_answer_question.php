<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'answer_question',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('question_id')->unsigned();
                $table->integer('answer_id')->unsigned();
                $table->foreign('answer_id')->references('id')->on('questions');
                $table->foreign('question_id')->references('id')->on('answers');
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
        Schema::dropIfExists('answer_question');
    }
}
