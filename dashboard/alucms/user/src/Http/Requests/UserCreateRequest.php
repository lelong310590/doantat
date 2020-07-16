<?php
/**
 * UserCreateRequest.php
 * Created by: trainheartnet
 * Created at: 7/16/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => trans('user::user.username.required'),
            'username.unique' => trans('user::user.username.unique'),
            'email.required' => trans('user::user.email.required'),
            'email.email' => trans('user::user.email.email'),
            'email.unique' => trans('user::user.email.unique'),
            'password.required' => trans('user::password.required'),
            'password.min' => trans('user::user.password.min'),
            'repassword.required' => trans('user::user.repassword.required'),
            'repassword.same' => trans('user::user.repassword.same'),
        ];
    }
}
