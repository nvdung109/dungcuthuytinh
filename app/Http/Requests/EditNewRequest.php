<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
use Illuminate\Validation\Rule;
class EditNewRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('news')->ignore($this->id, 'id')
            ],
            'url' => 'required',
            'description' => 'required',
            'desc_en' => 'required',
            'meta_title' => 'required',
             
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Hãy nhập tiêu đề bài viết',
            'title.unique' => 'Tiêu đề bài viết đã tồn tại, chọn tiêu đề khác',
            'url.required' => 'Hãy nhập đường dẫn', 
            'desc_en.required' => 'Hãy nhập mô tả ngắn',
            'description.required' => 'Hãy nhập nội dung',
            'meta_title.required' => 'Hãy nhập tiêu đề',
        ];
    }
}
