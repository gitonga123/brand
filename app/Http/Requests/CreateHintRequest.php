<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Hint;

class CreateHintRequest extends FormRequest
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
            'hint' => 'required|string',
            'description'=>'required|string',
        ];
    }

        /**
     * Cretae a Hint
     *
     * @return void
     */
    public function storeHint()
    {
        Hint::create(
            [
                'hint' => $this->hint,
            ]
        );
    }
}
