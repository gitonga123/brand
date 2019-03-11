<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHintQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'hint_question',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('hint_id')->unsigned();
                $table->integer('question_id')->unsigned();
                $table->foreign('hint_id')->references('id')->on('hints');
                $table->foreign('question_id')->references('id')->on('questions');
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
        Schema::dropIfExists('hint_question');
    }
}
