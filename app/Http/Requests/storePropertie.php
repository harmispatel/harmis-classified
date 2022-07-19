<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

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
        // dd('hello');
        // echo "<pre>";
        // print_r($request->all());exit;
        return [
            'name'     => 'required',
            'category_id' => 'required',
            'price'    => 'required',
            'country_id'  => 'required',
            'state_id'    => 'required',
            'address'  => 'required'
        ];

//         Array
// (
//     [_token] => rRWLWCfm8KpQwsD5TWw9fXv0rIx3ncxM9GlvsU3r
//     [name] => Hello
//     [category] => 1
//     [price] => 1
//     [country] => 1
//     [state] => 1
//     [address] => aaa
//     [status] => 1
//     [submit] =>
// )
    }
}
