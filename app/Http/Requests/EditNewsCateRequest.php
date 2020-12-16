<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
use Illuminate\Validation\Rule;
class EditNewsCateRequest extends FormRequest
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
        $reqDate = new DateTime('now');
        return [
            'name' => [
                'required',
                Rule::unique('cate_news')->ignore($this->id, 'id')
            ],
            'link' => 'required',
            'meta_title' => 'required',
            'meta_title' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tiêu đề bài viết',
            'name.unique' => 'Tên sản phẩm đã tồn tại, chọn tên khác',
            'link.required' => 'Hãy nhập đường dẫn',
            'meta_title.required' => 'Hãy nhập tiêu đề',
        ];
    }
}
