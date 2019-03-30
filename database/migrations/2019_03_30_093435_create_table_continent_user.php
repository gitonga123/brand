<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContinentUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'continent_user',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();;
                $table->integer('continent_id')->unsigned();;
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('continent_id')->references('id')->on('continents');
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
        Schema::dropIfExists('continent_user');
    }
}
