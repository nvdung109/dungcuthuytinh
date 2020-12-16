<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPageRequest extends FormRequest
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
            'name' => 'required|unique:page',
            'title' => 'required',
            'link' => 'required',
            'content' => 'required',
            'type' => 'required',

        ];
    }

    public function messages(){
        return [
            'name.required' => 'Hãy nhập tên trang',
            'name.unique' => 'Tên trang đã tồn tại, hãy chọn tên khác',
            'title.required' => 'Hãy nhập tiêu đề trang',
            'link.required' => 'Hãy nhập đường dẫn',
            'content.required' => 'Hãy nhập nội dung',
            'type.required' => 'Hãy chọn vị trí hiển thị',
        ];
    }
}
