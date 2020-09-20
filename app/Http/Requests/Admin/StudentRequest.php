<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email' => "required",
            'mobile' =>'required',
            'date_of_birth'=>'required',
            'avaliable_time_from'=>'required',
            'avaliable_time_to'=>'required',
            'governorate_id'=>'required',
            'group_id'=>'required',
            'day_id'=>'required',
            'teacher_id'=>'required',
            'gender'=>'required'
        ];
    }
}
