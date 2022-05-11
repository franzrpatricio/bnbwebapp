<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FilesFormRequest extends FormRequest
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
        $rules = [
            'filename' => [
                'required',
                // 'nullable',
                'mimes:pdf,jpeg,jpg,png,docx'
                #mimes limit to only these types of images
            ]
        ];
        return $rules;
    }
}
