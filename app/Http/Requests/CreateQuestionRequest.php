<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Question;

class CreateQuestionRequest extends FormRequest
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
            'title' => 'required',
            'published' => 'required|integer|min:1|max:2',
            'points' => 'required|numeric'
        ];
    }
    /**
     * Cretae the Question
     *
     * @return void
     */
    public function storeQuestion()
    {
        Question::create(
            [
                'title' => $this->title,
                'published' => $this->published,
                'points' => $this->points
            ]
        );
    }
}
