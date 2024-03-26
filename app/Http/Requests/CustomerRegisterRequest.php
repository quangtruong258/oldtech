<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:customers',
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' =>'required|string',
            
            'confirm_password' => 'required|same:password|string'
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập họ tên',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email'=>'Email không đúng định dạng. Vd: abc@xyz.com',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            'confirm_password.required' => 'Bạn chưa nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu không khớp',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'address.required' => 'Bạn chưa nhập địa chỉ.',
            
        ];
    }
}
