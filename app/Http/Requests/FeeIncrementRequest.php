<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeIncrementRequest extends FormRequest
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
            'name'=>'max:70',
            'class_id' => 'required_without:std_id' ,
            'std_id' => 'required_without:class_id|string',


           'amount'=>'required'
        ];
    }
}
