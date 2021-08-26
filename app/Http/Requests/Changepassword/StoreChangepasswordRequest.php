<?php
namespace App\Http\Requests\Changepassword;

use Illuminate\Foundation\Http\FormRequest;

class StoreChangepasswordRequest extends FormRequest {
    
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
            'old_password' =>  'min:6|required|max:255',     
            'news_password' => 'min:6|required_with:confirm_password|same:confirm_password|required|max:255',
        ];
        
    }

    public function messages(){
        return [
            'old_password.required' => 'Xin vui lòng nhập password mới',
            'old_password.min' => 'password mới không được dưới 6 ký tự',
            'old_password.max' => 'password mới không được quá 255 ký tự',
            'password.required' => 'Xin vui lòng nhập password',
            'password.min' => 'password không được dưới 6 ký tự',
            'password.max' => 'password không được quá 255 ký tự',
            'password.same' => 'password phải trùng nhau',
        ];
    }
}
        