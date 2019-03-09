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
        // Get all the roles attaching up to 3 random roles to each user
        $answers = App\Answer::all();

        // Populate the pivot table
        App\Question::all()->each(
            function ($question) use ($answers) {
                $question->answers()->attach(
                    $answers->random(rand(1, 5))->pluck('id')->toArray()
                );
            }
        );
    }
}
