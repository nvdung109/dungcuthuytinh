<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => 'required|unique:product|max:250',
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'url' => 'required',
            'masp' => 'required',
            'price' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'cate_id' => 'required',
            'brand_id' => 'required',
            'meta_title' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Hãy nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại, chọn tên khác',
            'name.max' => 'Tên sản phẩm không được vượt quá 250 ký tự',
            'image.required' => 'Hãy nhập ảnh',
            'image.file' => 'Hãy nhập file',
            'image.mimes' => 'Nhập đúng định dạng ảnh',
            'url.required' => 'Hãy nhập đường dẫn',
            'masp.required' =>'Hãy nhập mã sản phẩm',
            'price.required' => 'Hãy nhập giá',
            'price.numberic' => 'Hãy nhập số',
            'cate_id.required' => 'Hãy chọn danh mục sản phẩm',
            'brand_id.required' => 'Hãy chọn thương hiệu',

            'meta_title.required' => 'Hãy nhập tiêu đề',
            // 'address.numberic' => "Hãy nhập số",
            'description.required' => 'Hãy nhập nội dung',
            'description_en.required' => 'Hãy nhập mô tả ngắn'
        ];
    }
}
