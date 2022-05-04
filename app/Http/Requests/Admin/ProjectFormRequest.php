<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
            'category_id' => [
                // 'nullable',
                'required',
                'integer'
            ],
            'houseplan_id' => [
                'required',
                'integer'
                // 'nullable'
            ],
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'image' => [
                // 'required',
                'nullable',
                'mimes:jpeg,jpg,png'
                #mimes limit to only these types of image
            ],
            'cost' => [
                'required',
                'numeric' #para decimal
            ],
            'stories' => [
                // 'required',
                'string'
            ],
            'rooms' => [
                // 'required',
                'numeric' #para decimal
            ],
            'slug' => [
                'required',
                'string',
                'max:200'
            ],
            'description' => [
                'required'
            ],
            'meta_title' => [
                'required',
                'string',
                'max:200'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'amenity' => [
                'nullable',
            ],
            'filenames' => [
                'nullable',
            ],
            'filenames.*' => [
                'mimes:jpeg,jpg,png,gif',
            ],
            'status' => [
                'nullable',
            ]
        ];
        return $rules;
    }
}
