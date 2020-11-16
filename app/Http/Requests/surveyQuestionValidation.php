<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class surveyQuestionValidation extends FormRequest
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
            'question'=>'required',
            'question_type'=>'required',
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'question.required' => 'A question field  is required',
            'question_type.required' => 'A question type is required',
            'category_id.required'=>'A category type is required'
        ];
    }
}
