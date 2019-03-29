<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tags',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('sport_id')->unsigned();
                $table->integer('continent_id')->unsigned();
                $table->integer('country_id')->unsigned();
                $table->integer('competition_id')->unsigned();
                $table->integer('player_id')->unsigned();
                $table->integer('question_id')->unsigned();
                $table->foreign('question_id')->references('id')->on('questions');
                $table->foreign('sport_id')->references('id')->on('sports');
                $table->foreign('continent_id')->references('id')->on('continents');
                $table->foreign('country_id')->references('id')->on('countries');
                $table->foreign('competition_id')
                    ->references('id')->on('competitions');
                $table->foreign('player_id')->references('id')->on('players');
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
        Schema::dropIfExists('tags');
    }
}
