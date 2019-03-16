<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTrackerAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'trackers',
            function (Blueprint $table) {
                $table->integer('question_id')->unsigned();
                $table->integer('answer_id')->unsigned();
                $table->boolean('correct');
                $table->boolean('user_id')->unsigned();
                // $table->foreign('question_id')->references('id')->on('questions');
                // $table->foreign('user_id')->references('id')->on('users');
                // $table->foreign('answer_id')->references('id')->on('answers');
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
        Schema::table(
            'trackers',
            function (Blueprint $table) {
                $table->dropColumn(
                    ['question_id', 'answer_id', 'correct', 'user_id']
                );
            }
        );
    }
}
