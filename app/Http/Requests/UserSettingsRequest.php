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
            'date_format' => 'required|string',
            'user_id' => 'unique:user_settings'
        ];
    }

    /**
     * Store user setting
     * 
     * @param int $user_id
     * 
     * @return void
     */
    public function createSetting(int $user_id)
    {
        $result = UserSetting::create(
            [
                'date_format' => $this->date_format,
                'user_id' => $user_id
            ]
        );

        return $result;
    }
}
