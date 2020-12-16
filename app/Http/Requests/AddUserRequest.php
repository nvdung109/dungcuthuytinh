<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
class AddUserRequest extends FormRequest
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
        // $reqDate = $reqDate->modify('+20 days');
        return [
            'name' => 'required|unique:users|max:200',
            'email' => 'required|unique:users|email|',
            'avatar' => 'required|file|mimes:jpeg,png,jpg',
            'password' => 'required|min:6|max:32',
        ];
    }
    public function messages(){
        return [
            'name.required' => "Hãy nhập tên đăng nhập",
            'name.unique' => "Tên đăng nhập đã tồn tại",
            'email.required' => "Hãy nhập email",
            'email.unique' => "Email đã tồn tại",
            'email.email' => "Nhập đúng định dạng email",
            'avatar.required' => "Hãy nhập ảnh",  
            'avatar.file' => "Hãy nhập file",
            'avatar.mimes' => "Nhập đúng định dạng ảnh",  
            'password.required' => "Hãy nhập mật khẩu",
            'password.min' => "Mật khẩu ít nhất 6 chữ số",
            'password.max' => "Mật khẩu không quá 32 chữ số",

        ];
    }
}
