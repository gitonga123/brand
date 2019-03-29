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
                $table->string('name');
                $table->string('emoji');
                $table->integer('competition_id')->unsigned();
                $table->integer('country_id')->unsigned();
                $table->integer('continent_id')->unsigned();
                $table->timestamps();

                $table->foreign('competition_id')
                    ->references('id')
                    ->on('competitions');
                $table->foreign('country_id')->references('id')->on('countries');
                $table->foreign('continent_id')->references('id')->on('continents');
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
