<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'name'=>'required|max:191',
            'qualification'=>'max:191',
            'amount'=>'max:191',
            'fname'=>'required|max:191',
            'martial_status' => 'required',
            'dob'=>'required',
            'gender'=>'required',
            'email' => 'required',
            

        ];
    }
}
