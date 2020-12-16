<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;
use Illuminate\Validation\Rule;
class EditUserRequest extends FormRequest
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
           'name' => [
                'required',
                Rule::unique('users')->ignore($this->id, 'id')
            ],
           'email' => [
                'required','email',
                Rule::unique('users')->ignore($this->id, 'id')
            ],
           'password' => 'required|min:6',
       ];
   }
   public function messages(){
    return [
      'name.required' => "Hãy nhập tên",
      'name.unique' => "Tên đăng nhập đã tồn tại",
      'email.required' => "Hãy nhập email",
      'email.unique' => "Email đã tồn tại",
      'email.email' => "Nhập đúng định dạng email",
      'password.required' => "Hãy nhập mật khẩu",
      'password.min' => "Mật khẩu ít nhất 6 chữ số",          
  ];
}
}
