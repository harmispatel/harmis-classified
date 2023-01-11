<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class storeRegister extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'            => 'required',
            'image'           => 'mimes:jpeg,jpg,png,gif',
            'mobile'          => 'required',
            'email'           => 'required'
        ];

        if (Route::is('register')) {
            $rules += [
                'password'        => 'required',
                'confirmPassword' => 'required|same:password'
            ];
        }


        if (Route::is('userupdate') && !empty($this->password) && $this->password != null) {
            $rules += [
                'password'        => 'required',
                'confirmPassword' => 'required|same:password'
            ];
        }


        return $rules;

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
            'image.required'           => 'The image must be a file of type: jpeg, jpg, png, gif.',
            'email.required'           => 'Email is required',
            'email.email'              => 'Please enter a valid email address',
            'mobile.required'          => 'Mobile No. is required',
            'password.required'        => 'Password is required',
            'confirmPassword.required' => 'Password Confirmation is required',
        ];
    }
}
