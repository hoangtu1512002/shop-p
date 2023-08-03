<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,'. $this->usid,
            'password' =>  $this->usid ? 'nullable|min:6' : 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email không chính xác',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.required' => 'Mật khẩu không được để trống'
        ];
    }
}
