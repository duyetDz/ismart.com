<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ :attribute',
            'email.email' => 'Địa chỉ :attribute không hợp lệ',
            'password.required' => 'Vui lòng nhập :attribute',
            'password.min' => ':attribute phải chứa ít nhất 8 ký tự',
        ];
    }
}
