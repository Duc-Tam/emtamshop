<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email'       => 'bail|required|unique:users,email|max:190|min:10',
            'name'        => 'required',
            'phone'       => 'required',
            'password'    => 'required',
        ];
    }
    public function messages(){
        return [
            'email.required'       => 'Vui lòng nhập tên địa chỉ email',
            'email.unique'         => 'Email đã tồn tại vui lòng dùng một email khác',
            'email.min'            => 'Email phải có hơn 10 ký tự',
            'name.required'        => 'Vui lòng nhập tên khách hàng',
            'phone.required'       => 'Vui lòng nhập số điện thoại',
            'password.required'    => 'Vui lòng nhập mật khẩu',
        ];
    }
}
