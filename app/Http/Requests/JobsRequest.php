<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsRequest extends FormRequest
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
            'service' => ['required', 'integer', 'exists:service,id'],
            'description' => ['nullable', 'string'],
            'scope' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'service.required' => 'Incorrect service selected',
            'service.integer' => 'Incorrect service selected',
            'service.exists' => 'Incorrect service selected',
        ];
    }
}
