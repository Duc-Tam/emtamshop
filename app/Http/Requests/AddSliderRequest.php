<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSliderRequest extends FormRequest
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
            'name'        => 'bail|required|unique:sliders,name|min:6',
            'description'   => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required'       => 'Vui lòng nhập tên slider',
            'name.unique'         => 'Tên slider đã có trong CSDL',
            'name.min'            => 'Tên slider phải có hơn 6 ký tự',
            'description.required'  => 'Vui lòng nhập mô tả slider',
        ];
    }
}
