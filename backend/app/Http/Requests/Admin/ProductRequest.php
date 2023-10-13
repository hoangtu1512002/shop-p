<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->productId) {
            return [
                'name' => "required",
                'price' => "required",
                'total' => "required",
                'category_id' => "required"
            ];
        }
        else {
            return [
                'name' => "required",
                'image' => "required",
                'price' => "required",
                'total' => "required",
                'category_id' => "required"
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập tên sản phẩm",
            'image.required' => "Ảnh không được để trống",
            'price.required' => "Nhập giá tiền",
            'total.required' => "Nhập số lượng",
            'category_id.required' => "Chọn danh mục sản phẩm"
        ];
    }
}
