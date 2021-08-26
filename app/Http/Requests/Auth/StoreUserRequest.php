<?php
namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest {
    
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
            'email'    => 'required|email|max:255',
            'password' => 'min:6|required|max:255',
        ];
        
    }

    public function messages(){
        return [
            'email.required' => 'Xin vui lòng nhập email',
            'email.max' => 'Emai không được quá 255 kí tự',
            'email.email' => 'Emai phải nhập đúng ký tự',
            'password.required' => 'Xin vui lòng nhập password',
            'password.min' => 'password không được dưới 6 ký tự',
        ];
    }
}
        