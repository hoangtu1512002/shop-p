<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category.name' => 'required|max:100',
            'category.image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category.name.required' => 'vui lòng nhập tên danh mục.',
            'category.name.max' => 'độ dài không vượt quá 100 kí tự.',
            'category.image.required' => 'không được để ảnh trống.',
        ];
    }
}
