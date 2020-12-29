<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
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
            'key_config'        => 'bail|required|unique:settings,key_config|min:6',
            'value_config'   => 'required',
        ];
    }
    public function messages(){
        return [
            'key_config.required'       => 'Vui lòng nhập tên setting',
            'key_config.unique'         => 'Tên setting đã có trong CSDL',
            'key_config.min'            => 'Tên setting phải có hơn 6 ký tự',
            'value_config.required'     => 'Vui lòng nhập mô tả setting',
        ];
    }
}
