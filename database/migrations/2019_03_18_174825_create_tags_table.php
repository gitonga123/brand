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
                $table->foreign('sport_id')->references('sports')->on('id');
                $table->foreign('continent_id')->references('continents')->on('id');
                $table->foreign('country_id')->references('countries')->on('id');
                $table->foreign('competition_id')
                    ->references('competitions')->on('id');
                $table->foreign('player_id')->references('players')->on('id');
                $table->foreign('question_id')->references('questions')->on('id');
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
