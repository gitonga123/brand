<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\UserSetting;

class UserSettingsRequest extends FormRequest
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
            'date_format' => 'required|string'
        ];
    }

    /**
     * Store user setting
     * 
     * @param int $user_id
     * @return void
     */
    public function createSetting($user_id)
    {
        UserSetting::create(
            [
                'date_format' => $this->data_format,
                'user_id' => $user_id
            ]
        );
    }
}
