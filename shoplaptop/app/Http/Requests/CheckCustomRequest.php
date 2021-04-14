<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckCustomRequest extends FormRequest
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
            'hovaten' => 'required|min:2|max:100',
            'sodienthoai' => 'required|regex:/(0)[0-9]{9}/',
            'email' => 'required|email:rfc,dns,filter',
            'diachi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'hovaten.required' => 'Bạn chưa nhập họ và tên.',
            'hovaten.min' => 'Họ tên không thể nhỏ hơn 2 ký tự.',
            'hovaten.max' => 'Họ tên không thể lớn hơn 100 ký tự.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.rfc' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.dns' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.filter' => 'Email phải là một địa chỉ email hợp lệ.',
            'sodienthoai.required' => 'Bạn chưa nhập số điện thoại.',
            'sodienthoai.regex' => 'Số điện thoại không hợp lệ.',
            'diachi.required' => 'Bạn chưa nhập địa chỉ.',
        ];
    }
}
