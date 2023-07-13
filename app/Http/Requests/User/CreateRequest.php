<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:6|max:8',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please Enter Your First Name',
            'last_name.required' => 'Please Enter Your Last Name',
            'email.required' => 'We Need To Know Your Email Address!',
            'email.unique' => 'Sorry, This Email Address Is Already Used By Another User. Please Try With Different One.',
            'password.required' => 'Password Is Required For Your Information Safety.',
            'password.min' => 'Password Length Should Be More Than 6 Character Or Digit Or Mix.',
            'confirm_password.required' => 'Please Enter Confirm Your Password.',
            'confirm_password.same' => 'The Confirm Password And Password Must Match.'
        ];
    }
}
