<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Quiz;
use App\User;

class QuizController extends Controller
{

    /**
     * Get the user preferences and return the questions and answers.
     * Currently working on level of difficulty first
     *
     * @param Request $request
     * @return void
     */
    public function entry($level)
    {
        // $level = $request->level;
        $level = Level::findOrFail($level);

        $quiz_id = $this->compose($level);
        $quiz = new Quiz();
        $questions = $this->questions($quiz->getQuestions($quiz_id));

        return view('quiz.start', compact('questions'));
    }

    /**
     * Compose the kind of questions to ask
     *
     * @param \App\Level $level
     *
     * @return float $quiz_id
     */
    protected function compose(Level $level): float
    {
        $quiz = array();
        $questions = $level->questions->take(5);
        // adding more user preference in the future
        foreach ($questions as $question) {
            $quiz[] = $question->id;
        }
        // use user id
        // there is a near zero chance that a user will likely face the same question twice
        // this will be implemented in future
        $user = User::find(4);
        $quiz_id = array_sum($quiz) + $user->id;

        foreach ($questions as $question) {
            Quiz::create(
                [
                    'quiz_id' => $quiz_id,
                    'question_id' => $question->id
                ]
            );
        }

        return $quiz_id;
    }

    /**
     * Return Questions Related to that quiz
     *
     * @param mixed $quizzes
     * @return mixed
     */
    public function questions($quizzes)
    {
        $questions = array();
        foreach ($quizzes as $quiz) {
            $questions[] = $quiz->questions;
        }
        return collect($questions);
    }
}
