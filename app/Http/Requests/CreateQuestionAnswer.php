<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\QuestionAnswer;

class CreateQuestionAnswer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_id' => 'required|numeric',
            'answer_id' => 'required|numeric'
        ];
    }

    /**
     * Store the questions and the right answers
     * 
     * @return void
     */
    public function storeQuestionAnswer()
    {
        QuestionAnswer::create(
            [
                'question_id' => $this->question_id,
                'answer_id' => $this->answer_id
            ]
        );
    }
}
