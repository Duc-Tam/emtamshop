<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBlogRequest extends FormRequest
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
            'b_name'        => 'bail|required|unique:blogs,b_name|min:10',
            'b_slug'        => 'required',
            'b_desc'        => 'required',
            'b_content'     => 'required',
            'b_author'      => 'required',
        ];
    }
    public function messages(){
        return [
            'b_name.required'       => 'Vui lòng nhập tiêu đề',
            'b_name.unique'         => 'Tin đã có trong CSDL',
            'b_name.min'            => 'Tên sản phẩm phải có hơn 10 ký tự',
            'b_slug.required'       => 'Vui lòng nhập đường dẫn chuẩn SEO',
            'b_desc.required'       => 'Vui lòng nhập mô tả',
            'b_content.required'    => 'Vui lòng nhập nội dung tin',
            'b_author.required'     => 'Vui lòng nhập tác giả',
        ];
    }
}
