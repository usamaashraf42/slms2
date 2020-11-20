<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyAnswerValidation extends FormRequest
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
            'branch_id'=>'required',
            'section_type'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'branch_id.required' => 'Branch Name is required',
            'section_type.required'=>'Section Name is required',
        ];
    }
}
