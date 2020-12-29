<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'p_name'        => 'bail|required|unique:products,p_name|min:10',
            'p_slug'        => 'required',
            'p_category_id' => 'required',
            'p_price'       => 'required',
            'description'   => 'required',
        ];
    }

    public function messages(){
        return [
            'p_name.required'       => 'Vui lòng nhập tên sản phẩm',
            'p_name.unique'         => 'Sản phẩm đã có trong CSDL',
            'p_name.min'            => 'Tên sản phẩm phải có hơn 10 ký tự',
            'p_slug.required'       => 'Vui lòng nhập đường dẫn chuẩn SEO',
            'p_price.required'      => 'Vui lòng nhập giá sản phẩm',
            'p_category_id.required'=> 'Vui lòng chọn danh mục sản phẩm',
            'description.required'  => 'Vui lòng nhập mô tả sản phẩm',
        ];
    }
}
