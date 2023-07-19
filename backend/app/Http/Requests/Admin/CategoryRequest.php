<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImageRule;

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
            'name' => 'required|max:100|unique:categories,name,' .$this->id. ',id',
            'image' => !$this->id ? 'required' : "" 
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'danh mục đã tồn tại.',
            'name.required' => 'vui lòng nhập tên danh mục.',
            'name.max' => 'độ dài không vượt quá 100 kí tự.',
            'image.required' => 'không được để ảnh trống.',
        ];
    }
}
