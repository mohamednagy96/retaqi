<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        $id=request()->teacher;
        return [
            'name' => 'required|min:2',
            'email' => "required|email|unique:teachers,email,{$id}",
            'mobile' =>'required',
            'date_of_birth'=>'required',
            'governorate_id'=>'required',
            'gender'=>'required'
        ];
    }
}
