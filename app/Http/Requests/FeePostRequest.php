<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeePostRequest extends FormRequest
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
            'fee_due_date1'=>'required',
            'fee_due_date2'=>'required',
            'month'=>'required',
            'year'=>'required'
        ];
    }
}
