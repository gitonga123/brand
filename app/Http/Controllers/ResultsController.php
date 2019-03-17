<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultsRequest;
use App\Question;
use App\Tracker;
use App\Tracer;
use App\User;
use App\Trace;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    /**
     * Check Question is equal to answer
     * 
     * @param  \App\Http\Requests\ResultsRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function checkQuestionAnswer(ResultsRequest $request)
    {
        $question = Question::findOrFail($request->question);
        $user = User::findOrFail(1);
        $answer = $question->answer;
        $answer_match = ($request->answer == $answer->answer_id) ? true : false;
        $tracker = $this->track(
            $question->id,
            $answer->id,
            $answer_match,
            $question->points,
            $user->id
        );

        $this->tracer($tracker, $user->id, $request->quiz_id);
        return response()->json(['success' => true, 'answer' => true]);
    }

    /**
     * Get My Results
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function getResult(Request $request)
    {
        $result = $this->results($request->user_id, $request->code);
        dd($result);
        return response()->json(['success' => true, 'results' => $result]);
    }

    /**
     * Track Question, Answer and Result
     * 
     * @param  int $question
     * @param  int $answer
     * @param  boolean $bool
     * @param  float $points
     * @param  int $user_id
     * 
     * @return int
     */
    protected function track(int $question, int $answer, bool $bool, float $points, int $user_id): int
    {
        $tracker = Tracker::create(
            [
                'question_id' => $question,
                'answer_id' => $answer,
                'correct' => $bool,
                'points' => $points,
                'user_id' => $user_id
            ]
        );

        return $tracker->id;
    }

    /**
     * Trace user Questions
     *
     * @param integer $tracker
     * @param integer $user_id
     * @param integer $trace
     * 
     * @return void
     */
    protected function tracer(int $tracker, int $user_id, int $trace): void
    {
        $trace = Trace::create(
            [
                'tracker_id' => $tracker,
                'user_id' => $user_id,
                'trace' => $trace
            ]
        );
    }

    /**
     * Return the Results of a Questions
     *
     * @param integer $user_id
     * @param integer $trace
     * @return array
     */
    protected function results(int $user_id, int $trace): array
    {
        $total = 0;
        $won = 1;
        $fail = 1;
        $results = array();
        $resulting = array();
        $points_fail = array();
        $points_won = array();

        $tracer = new Trace();
        $resulting = $tracer->getTrace($user_id, $trace);

        foreach ($resulting as $result) {
            $tracker = $result->tracker_id;

            $check = Tracker::findOrFail($tracker);
            if (($check->correct === 1 || $check->correct == true) && $check->user_id === $user_id) {
                $won = $won * $check->points;
                $results['won'] = $won;
                $points_won[] = $check->points;
            } else if (($check->correct === 0 || $check->correct == false) && $check->user_id === $user_id) {
                $fail = $fail * $check->points;
                $results['fail'] = $fail;
                $points_fail[] = $check->points;
            }
        }

        $total = $results['won'] + $results['fail'];
        $results['total'] = $total;
        $results['points_fail'] = $points_fail;
        $results['points_won'] = $points_won;
        return $results;
    }
}
