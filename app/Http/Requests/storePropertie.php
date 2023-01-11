<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class storePropertie extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name'              => 'required|unique:properties,name',
            'category_id'       => 'required',
            'price'             => 'integer|min:0',
            'country_id'        => 'required',
            'state_id'          => 'required',
            'address'           => 'required',
            'image'             => 'required',
            'multiImage'        => 'required',
            'bedroom'           => 'integer|min:0',
            'bath'              => 'integer|min:0',
            'building_area'     => 'required|min:0',
            'garage'            => 'integer|min:0',
            'kitchen'           => 'integer|min:0',
            'description'       => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
