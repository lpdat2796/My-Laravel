<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
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
            'matkhau'=>'required|min:6|max:20',
            'matkhaure'=>'same:matkhau',
        ];
    }
    public function messages()
    {
        return[
            'matkhau.min'=>'Mật khẩu phải nhiều hơn 6 ký tự',
			'matkhau.max'=>'Mật khẩu phải ít hơn 20 ký tự',
            'matkhaure.same'=>'Mật khẩu không giống nhau',
        ];
    }
}
