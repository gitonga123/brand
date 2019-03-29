<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableQuestionsAddColumnLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'questions',
            function (Blueprint $table) {
                $table->integer('level_id')->unsigned()->default(1);
                $table->foreign('level_id')->references('id')->on('levels');
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
            'questions',
            function (Blueprint $table) {
                $table->dropColumn('level_id');
                // $table->dropForeign('level_id');
            }
        );
    }
}
