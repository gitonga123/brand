<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'players',
            function (Blueprint $table) {
                $table->increments('id');
                $table->name('id');
                $table->string('emoji');
                $table->integer('competition_id')->unsigned();
                $table->integer('country_id')->unsigned();
                $table->integer('continent_id')->unsigned();
                $table->timestamps();
                $table->foreign('competition_id')->references('competitions')->on('id');
                $table->foreign('country_id')->references('countries')->on('id');
                $table->foreign('continent_id')->references('continents')->on('id');
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
        Schema::dropIfExists('players');
    }
}
