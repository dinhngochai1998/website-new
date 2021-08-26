<?php
namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest {
    
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
            'title'    => 'required|max:255',
            'slug' => 'required|max:255',
            'content'    => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|',
            'id_category' => 'required',
            'sort' => 'nullable',
        ];
        
    }

    public function messages(){
        return [
            'title.required' => 'Xin vui lòng nhập title',
            'title.max' => 'title không được quá 255 kí tự',
            'slug.required' => 'Xin vui lòng nhập slug',
            'slug.max' => 'slug không được quá 255 kí tự',
            'content.required' => 'Xin vui lòng nhập content',
            'content.max' => 'content không được quá 255 kí tự',
            'description.required' => 'Xin vui lòng nhập description',
            'image.image' => 'xin vui lòng choose image',
            'image.mimes' => 'bạn chỉ được nhap ieg ng jg gif svg',
            'image.max' => 'image không được quá 2048MB',
            'image.required' => 'Xin vui lòng nhập image',
        ];
    }
}
        