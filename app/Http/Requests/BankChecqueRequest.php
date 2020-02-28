<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BankChecqueRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'account_id'=>'required',
            'cheque_start'=>'required|integer',
            'cheque_end'=>'required|integer|min:'.(int)$request->cheque_start,
            'cheque_book_issue_date'=>'required'
        ];
    }
}
