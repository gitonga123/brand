<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all the Questions attaching up to 3 random answers to each user
        $answers = App\Answer::all();

        // Populate the pivot table
        App\Question::all()->each(
            function ($question) use ($answers) {
                $question->answers()->attach(
                    $answers->random(rand(1, 5))->pluck('id')->toArray()
                );
            }
        );

        // Get all the question attaching up to 3 random hints to each user
        $hints = App\Hint::all();

        // Populate the pivot table
        App\Question::all()->each(
            function ($question) use ($hints) {
                $question->hints()->attach(
                    $hints->random(rand(1, 5))->pluck('id')->toArray()
                );
            }
        );
    }
}
