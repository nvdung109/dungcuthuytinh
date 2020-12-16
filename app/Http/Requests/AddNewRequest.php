<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
class AddNewRequest extends FormRequest
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
            'title' => 'required|unique:news',
            'url' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'description' => 'required',
            'desc_en' => 'required',
            'meta_title' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Hãy nhập tiêu đề bài viết',
            'title.unique' => 'Tên sản phẩm đã tồn tại, chọn tên khác',
            'url.required' => 'Hãy nhập đường dẫn',
            'image.required' => 'Hãy chọn ảnh',
            'image.file' => 'Hãy chọn ảnh',
            'image.mimes' => 'Chọn ảnh đúng định dạng ảnh jpeg, png, jpg',
            'description.required' => 'Hãy nhập nội dung mô tả',
            'desc_en.required' => 'Hãy nhập mô tả ngắn',
            'meta_title.required' => 'Hãy nhập tiêu đề',
        ];
    }
}
