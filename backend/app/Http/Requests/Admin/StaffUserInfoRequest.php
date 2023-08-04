<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StaffUserInfoRequest extends FormRequest
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
        "fullname" => 'required',
        "date_of_birth" => 'required',
        "gender" => 'required',
        "phone" => 'required',
        "address" => 'required',
        "date_start_work" => 'required',
        "salary" => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Họ tên không được để trống',
            'date_of_birth' => 'Ngày sinh không được để trống',
            'gender.required' => 'Giới tình không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'date_start_work.required' => 'Ngày bắt đầu làm việc không được để trống',
            'salary.required' => 'Mức lương không được để trống',
        ];
    }
}
