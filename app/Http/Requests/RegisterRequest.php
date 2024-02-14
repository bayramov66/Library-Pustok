<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>  ['required', 'string', 'max:255', Rule::unique('users', 'email')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required',
            'cpassword' => 'required|same:password',
        ];
    }
    public function messages(){
        return [
            'password.regex' => 'Password must contain at least one uppercase letter and one special character.',
            'name.required' => 'Enter Your Name',
            'email.required' => 'Enter Email',
            'email.email' => 'Please Enter Email',
            'password.required' => 'Enter Password',
            'cpassword.required' => 'Enter the same Password',
            'cpassword.same' => 'Passwords do not match',
        ];
    }
}
