<?php

namespace App\Http\Requests\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
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
            'name'    => 'required|max:255',
            'slug' => 'required|max:255',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Xin vui lòng nhập title',
            'name.max' => 'title không được quá 255 kí tự',
            'slug.required' => 'Xin vui lòng nhập slug',
            'slug.max' => 'slug không được quá 255 kí tự',
            'category_id.required' => 'Vui lòng chọn chuyên mục',
        ];
    }
}
