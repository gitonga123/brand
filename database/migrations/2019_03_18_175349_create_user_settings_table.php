<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_settings',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('date_format')->default('dd/mm/Y');
                $table->integer('level_id')->unsigned();
                $table->integer('sport_id')->unsigned();
                $table->integer('continent_id')->unsigned();
                $table->integer('competition_id')->unsigned();
                $table->integer('player_id')->unsigned();
                $table->integer('country_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->foreign('level_id')->references('levels')->on('id');
                $table->foreign('sport_id')->references('sports')->on('id');
                $table->foreign('continent_id')->references('continents')->on('id');
                $table->foreign('country_id')->references('countries')->on('id');
                $table->foreign('competition_id')
                    ->references('competitions')->on('id');
                $table->foreign('player_id')->references('players')->on('id');
                $table->foreign('user_id')->references('users')->on('id');
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
        Schema::dropIfExists('user_settings');
    }
}
