<?php

use Illuminate\Database\Seeder;
use App\Answer;
use App\Question;
use App\Hint;
use App\Level;
use App\QuestionAnswer;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create users
        factory(User::class, 500)->create();
        // Create Levels
        $level = factory(Level::class, 5)->create();
        // Create Questions
        $questions = factory(Question::class, 1000)->create();
        // create Answers
        $answers = factory(Answer::class, 1500)->create();

        $answers = Answer::all();
        // Get all the Questions attaching up to 3 random answers to each user

        Question::all()->each(
            function ($question) use ($answers) {
                $question->answers()->attach(
                    $answers->random(rand(1, 5))->pluck('id')->toArray()
                );
            }
        );

        // create hints
        factory(Hint::class, 5000)->create();
        // Get all the question attaching up to 3 random hints to each user
        $hints = Hint::all();

        // Populate the pivot table
        Question::all()->each(
            function ($question) use ($hints) {
                $question->hints()->attach(
                    $hints->random(rand(1, 5))->pluck('id')->toArray()
                );
            }
        );

        factory(QuestionAnswer::class, 500);
    }
}
