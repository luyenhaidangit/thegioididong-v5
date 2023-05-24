<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:8|max:16',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Vui lòng nhập đúng vd: trongak123@gmail.com ',
            'password.min' => 'Mật khẩu tối thiểu là 8 ký tự và tối đa 16 ký tự!',
            'password.max' => 'Mật khẩu tối đa là 16 ký tự và tối thiểu 8 ký tự!'
        ];
    }
}
