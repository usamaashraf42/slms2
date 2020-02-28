<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStatusUpdateRequest extends FormRequest
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
            'statusId'=>'required',
            'application_ids'=>'required',
            // 'schedule'=>'required',
            'start_date'=>'required',
            'till_date'=>'required',
            'start_time'=>'required',
            'till_time'=>'required',
            'country_id'=>'required',
            'Venue'=>'required',
            'contact_no'=>'required',
            'regards'=>'required',
            'contact_email'=>'required',
            'address'=>'required',
            'email_subject'=>'required',
            'email_body'=>'required',
            

        ];
    }
}
