<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
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
            [
                    'file'      => $request->file('attachment'),
                    'extension' => strtolower($request->file('attachment')->getClientOriginalExtension()),
                ],
                [
                    'file'          => 'required',
                    'extension'      => 'required|in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,jpeg,jpg,png,icon,txt,pdf,svg',
                ]
        ];
    }
}
