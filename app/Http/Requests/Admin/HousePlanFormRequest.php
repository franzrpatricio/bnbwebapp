<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HousePlanFormRequest extends FormRequest
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
            'type' => [
                'required',
                'string',
                'max:200'
            ],
            'cost' => [
                'required',
                'numeric' #para decimal
            ],
            'floor' => [
                'required',
                'string',
                'max:200'
            ],
            'wall' => [
                'required',
                'string',
                'max:200'
            ],
            'window' => [
                'required',
                'string',
                'max:200'
            ],
            'ceiling' => [
                'required',
                'string',
                'max:200'
            ],
            'status' => [
                'nullable',
            ]
        ];
        return $rules;
    }
}
