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
                $table->integer('country')->unsigned();
                $table->integer('continent')->unsigned();
                $table->timestamps();
                $table->foreign('competition')->references('competitions')->on('id');
                $table->foreign('country')->references('countries')->on('id');
                $table->foreign('continent')->references('continents')->on('id');
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
