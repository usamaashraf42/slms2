<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class surveyCategoryValidation extends FormRequest
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
            'cat_name'=>'required',
            'cat_type'=>'required',
            'month'=>'required',
            'year'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'cat_name.required' => 'A category field  is required',
            'cat_type.required' => 'A category type is required',
        ];
    }
}
