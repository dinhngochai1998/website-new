<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'parent_id' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Xin vui lòng nhập name',
            'name.max' => 'title không được quá 255 kí tự',
            'slug.required' => 'Xin vui lòng nhập slug',
            'slug.max' => 'slug không được quá 255 kí tự',
        ];
    }
}
