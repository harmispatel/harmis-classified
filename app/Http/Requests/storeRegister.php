<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRegister extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'required',
            'userimage'           => 'mimes:jpeg,jpg,png,gif',
            'mobile'          => 'required',
            'email'           => 'required',
            'password'        => 'required',
            'confirmPassword' => 'required|same:password'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'            => 'Name is required',
            'userimage.required'           => 'The image must be a file of type: jpeg, jpg, png, gif.',
            'email.required'           => 'Email is required',
            'email.email'              => 'Please enter a valid email address',
            'mobile.required'          => 'Mobile No. is required',
            'password.required'        => 'Password is required',
            'confirmPassword.required' => 'Password Confirmation is required',
        ];
    }
}
