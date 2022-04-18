<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InquiryFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'email' => [
                'required',
                'string',
                'max:200'
            ],
            'contact' => [
                'required',
                'string',
                'max:200'
            ],
            'address' => [
                'required',
                'string',
                'max:200'
            ],
        ];
        return $rules;
    }
}
