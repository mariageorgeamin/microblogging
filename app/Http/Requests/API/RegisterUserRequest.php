<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            //
            'name' => 'required|min:3|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'img' => 'required|mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            //
            'password.regex' => 'Password must contain at least one Uppercase, one Lower case, one numeric value. And, one special character.',
        ];
    }
}
