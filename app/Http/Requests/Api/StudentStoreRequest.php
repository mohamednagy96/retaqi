<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends BaseFormRequest
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
        if(request()->type == 'old'){
        return [
            'name' => 'required | min:6 | max: 50',
            'email' => 'required|email|unique:students,email',
            'password' => 'required| min:4| max:50',
            'c_password'=>'required|same:password',
            'mobile' =>'required',
            'date_of_birth'=>'required',
            'avaliable_time'=>'required',
            'governorate_id'=>'required',
            'group_id'=>'required',
            'day_id'=>'required',
            'teacher_id'=>'required',
            'gender'=>'required'

        ];
    } elseif(request()->type == 'new'){
        return [
            'name' => 'required | min:6 | max: 50',
            'email' => 'required|email|unique:students,email',
            'password' => 'required| min:4| max:50',
            'c_password'=>'required|same:password',
            'mobile' =>'required',
            'date_of_birth'=>'required',
            'avaliable_time'=>'required',
            'governorate_id'=>'required',
            'previous_preservation'=>'required',
            'day_id'=>'required',
            'teacher_id'=>'required',
            'gender'=>'required'

        ];
    }
    }
    public function messages()
    {
        return[
           //
        ];
    }
}
