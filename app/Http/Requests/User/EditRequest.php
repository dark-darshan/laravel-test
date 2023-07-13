<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user->id,
        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'Please Enter Your First Name',
            'last_name.required' => 'Please Enter Your Last Name',
            'email.required' => 'The email is required.',
            'email.email' => 'The email needs to have a valid format.',
            'email.exists' => 'The email is not registered in the system.', 
        ];
    }
}
