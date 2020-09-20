<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserStoreRequest extends FormRequest
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
        $id = request()->admin_user;
        // dd($id);
        return [
            'name' => 'required|min:2',
            'email' => "required|email|unique:admins,email,{$id}",
            'password' => ($id ? 'nullable' : 'required').'|min:8'
        ];
    }
}
