<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StoreContactRequest extends FormRequest
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
            'tel'     => 'required|max:10',
            'email'   => 'required|email|max:255',
            'content' => 'required|max:255',
    
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Xin vui lòng nhập name',
            'name.max' => 'title không được quá 255 kí tự',
            'tel.max' => 'tel không được quá 10 số',
            'tel.required' => 'tel không được để trống',
            'email.max' => 'email không được quá 255 kí tự',
            'email.required' => 'Vui lòng nhap email',
            'email.email' => 'Vui lòng đúng kiểu email',
            'content.required' => 'Xin vui lòng nhập content',
            'content.max' => 'slug không được quá 255 kí tự',
        ];
    }
}
