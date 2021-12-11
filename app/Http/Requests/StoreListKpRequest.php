<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListKpRequest extends FormRequest
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
            'name'        => 'required|max:50|string',
            'address'     => 'required|max:100|string',
            'telephone'   => 'required|numeric|digits_between:10,12',
            'postal_code' => 'required|numeric|digits_between:5,10',
            'city'        => 'required|max:50|string'
        ];
    }
}
