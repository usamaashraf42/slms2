<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterationRequest extends FormRequest
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
            's_name'=>'required|max:191',
            's_DOB'=>'required',
            's_fatherName'=>'required|max:191',
            's_sex'=>'required',
            'course_id'=>'required',
            'section_id'=>'required',
            'total_annual_fee'=>'required|numeric|min:0|not_in:0',
            'father_cnic'=>'required',
            // 'feeStruture'=>'required',
            
        ];
    }
}
