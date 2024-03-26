<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAuthRequest extends FormRequest
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
            'email' => 'required|exists:customers',
           
            'password' => 'required',
                    
        ];
    }

    public function messages()
    {
        return [
           
            'email.required' => 'Bạn chưa nhập email.',
            'email.email'=>'Email không đúng định dạng. Vd: abc@xyz.com',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
 
        ];
    }
}
