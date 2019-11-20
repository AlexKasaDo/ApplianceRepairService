<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //Todo:: add messagformat phone
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'unique:contacts,email',
            ],
            'phone' => [
                'regex:/^((((\(\d{1,3}\))|(\d{3}-))\d{3}-\d{2,4})|(\+?\d{2}((-| )\d{1,8}){1,5}))(( x| ext)\d{1,5}){0,1}$/i',
                'required',
            ],
            'instruction' => [
                'nullable',
                'max:255',
                'string',
            ],
            'address_address' => [
                'max:255',
                'string',
            ],
            'address_latitude' => [
                'numeric'
            ],
            'address_longitude' => [
                'numeric'
            ],
        ];
    }
}
