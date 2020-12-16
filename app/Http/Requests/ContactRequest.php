<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|email|',
            'content' => 'required',
            'telephone' => 'required|numeric|min:10',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Hãy nhập tiêu đề',
            'name.required' => 'Hãy nhập tên của bạn',
            'email.required' => 'Hãy nhập email',
            'email.email' => 'Nhập đúng định dạng email',
            'content.required' => 'Hãy nhập nội dung cần hỗ trợ',
            'telephone.required' => 'Hãy nhập số điện thoại',
            'telephone.numeric' => 'Hãy nhập số',
            'telephone.min' => 'Số điện thoại gồm 10 số',
        ];
    }
}
