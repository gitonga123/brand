<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Answer;

class CreateAnswerRequest extends FormRequest
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
            'title' => 'required|string',
            'correct' => 'required'
        ];
    }

    /**
     * Store a New Question
     * 
     * @return void
     */
    public function storeAnswer()
    {
        Answer::create(
            [
                'title' => $this->title,
                'correct' => $this->correct
            ]
        );
    }
}
