<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
use Illuminate\Validation\Rule;
class EditProductRequest extends FormRequest
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
        $reqDate        = new DateTime('now');
        return [
            'name' => [
                'required',
                Rule::unique('product')->ignore($this->id, 'id')
            ],
            'masp' => 'required',
            'url' => 'required',
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
            'url.required' => 'Hãy nhập đường dẫn',
            'masp.required' =>'Hãy nhập mã sản phẩm',
            'price.required' => 'Hãy nhập giá',
            'price.numberic' => 'Hãy nhập số',
            'cate_id.required' => 'Hãy chọn danh mục sản phẩm',
            'brand_id.required' => 'Hãy chọn thương hiệu',
            'description.required' => 'Hãy nhập nội dung',
            'description_en.required' => 'Hãy nhập mô tả ngắn',
            'meta_title.required' => 'Hãy nhập tiêu đề',

        ];
    }
}
