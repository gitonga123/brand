<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTFsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'question_t_fs',
            function (Blueprint $table) {
                $table->increments('id');
                $table->text('title')->nullable(false);
                $table->integer('published')->unsigned()->nullable(false);
                $table->float('points')->nullable(false);
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
        Schema::dropIfExists('question_t_fs');
    }
}
