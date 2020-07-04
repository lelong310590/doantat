<?php
/**
 * Author: Le Ngoc Long
 * Email: longlengoc90@gmail.com
 * Phone: 078.223.6969
 * Class AuthRequest
 * @package AluCMS\Auth\Http\Request
 */

namespace AluCMS\Auth\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => trans('auth::auth.username_error_required'),
            'password.required' => trans('auth::auth.password_error_required')
        ];
    }
}
