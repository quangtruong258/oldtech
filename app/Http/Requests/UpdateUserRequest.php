<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email, '.$this->id.'|string',
           
            'user_catalogue_id' => 'required|integer|gt:0',
           
            
        ];
    }

    public function messages()
    {
        return [
            
          
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên', 
            
        ];
    }
}
