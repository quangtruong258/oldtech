<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'image' => 'file|mimes:jpg,jpeg,png,gif',
            

            
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
