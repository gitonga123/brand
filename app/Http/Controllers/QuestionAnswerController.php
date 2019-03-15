<?php

namespace App\Http\Controllers;

use App\QuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionAnswer;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionAnswer $request)
    {
        $request->storeQuestionAnswer();
        session()->flash('success', 'Question and Answer Stored Successfully');

        return redirect()->route(
            'questions.show',
            ['question_id' => $request->question_id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionAnswer $questionAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionAnswer $questionAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionAnswer  $questionAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $questionAnswer)
    {
        $input = $request->only('question_id', 'answer_id');
        $questionAnswer = QuestionAnswer::findorFail($questionAnswer);
        if ($questionAnswer) {
            $questionAnswer->fill($input)->save();


            session()->flash(
                'success',
                'Question Plus the answer Updated Successfully'
            );

            return redirect()->route(
                'questions.show',
                ['question' => $questionAnswer->question_id]
            );
        } else {
            session()->flash('error', 'This Question has no answer');

            return redirect()->route(
                'questions.show',
                ['question' => $questionAnswer->question_id]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionAnswer  $questionAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionAnswer $questionAnswer)
    {
        //
    }
}
