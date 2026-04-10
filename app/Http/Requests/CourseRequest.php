<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        $courseId = $this->route('course'); 

        return [
            'name' => 'required|min:3|unique:courses,name,' . $courseId,
            // Thêm max:99999999 để chặn nhập quá 99 triệu
            'price' => 'required|numeric|min:1|max:99999999', 
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:draft,published',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Tên khóa học này đã tồn tại, vui lòng nhập tên khác!',
            'name.required' => 'Vui lòng không để trống tên khóa học!',
            'name.min' => 'Tên khóa học phải dài từ 3 ký tự trở lên.',
            'price.required' => 'Vui lòng nhập giá khóa học!',
            'price.min' => 'Giá khóa học phải lớn hơn 0.',
            // Thêm dòng thông báo này
            'price.max' => 'Giá khóa học không được vượt quá 99,999,999 VNĐ.', 
        ];
    }
}