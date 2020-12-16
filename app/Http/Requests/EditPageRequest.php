<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
use Illuminate\Validation\Rule;
class EditPageRequest extends FormRequest
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
                Rule::unique('page')->ignore($this->id, 'id')
            ],
            'title' => 'required',
            'link' => 'required',
            'content' => 'required',
            'type' => 'required',
             
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Hãy nhập tên trang',
            'name.unique' => 'Tên trang đã tồn tại, chọn tên khác',
            'title.required' => 'Hãy nhập tiêu đề trang',
            'link.required' =>'Hãy nhập đường dẫn', 
            'type.required' => 'Hãy chọn vị trí hiển thị',
            'content.required' => 'Hãy nhập nội dung',
        ];
    }
}
