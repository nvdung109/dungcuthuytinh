<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
use Illuminate\Validation\Rule;
class EditCategoryRequest extends FormRequest
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
                Rule::unique('category')->ignore($this->id, 'id')
            ],
            'link' => 'required',
            'description' => 'required',
             'meta_title' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Hãy nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại, chọn tên khác',
            'name.max' => 'Tên sản phẩm không được vượt quá 250 ký tự',
            'link.required' => 'Hãy nhập đường dẫn',
            'description.required' => 'Hãy nhập nội dung',
            'meta_title.required' => 'Hãy nhập tiêu đề',
        ];
    }
}
