<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskProjectRequest extends FormRequest
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
            'task_name'=>'required|max:191',
            'description'=>'required',
            'user_id'=>'required',
            'pro_id'=>'required'
        ];
    }
}
