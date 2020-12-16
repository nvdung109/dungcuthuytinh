<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSlideRequest extends FormRequest
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
        // $reqDate = new DateTime('now');
        return [
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'link' => 'required',
            'title' => 'required',
        ];
    }
    public function messages(){
        return [
            'image.required' => 'Hãy chọn ảnh',
            'image.file' => 'Hãy nhập file',
            'image.mimes' => 'Nhập đúng định dạng ảnh',
            'link.required' => 'Nhập đường dẫn',
            'title.required' => 'Nhập tiêu đề ảnh',
        ];
    }
}
