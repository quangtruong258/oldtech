<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'email' => 'required|email|unique:users|string',
            'password' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',
            're_password' => 'required|same:password|string'
            
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email.',
            'email.email'=>'Email không đúng định dạng. Vd: abc@xyz.com',
            'email.email'=>'Email đã được sử dụng. Hãy chọn email khác',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên', 
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            're_password.required' => 'Bạn chưa nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu không khớp'
        ];
    }
}
