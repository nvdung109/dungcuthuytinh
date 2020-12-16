<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
use Illuminate\Validation\Rule;
class AddBannerRequest extends FormRequest
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
            'name' => 'required|unique:banner|max:250',
            'image' => 'required|file|mimes:jpeg,png,jpg',
            'link' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => "Hãy nhập tên sản phẩm",
            'name.unique' => 'Tên sản phẩm đã tồn tại, chọn tên khác',
            'name.max' => 'Tên sản phẩm không được vượt quá 250 ký tự',

            'image.required' => 'Hãy nhập ảnh',
            'image.file' => 'Hãy nhập file',
            'image.mimes' => 'Nhập đúng định dạng ảnh',
            'link.required' => 'Nhập đường dẫn',
        ];
    }
}
