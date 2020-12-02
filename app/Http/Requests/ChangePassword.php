<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use const true;

class ChangePassword extends FormRequest
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
            'old_pass' =>'required',
            'password' =>['required','confirmed'],
            'password_confirmation' =>'required'
        ];
    }
}
