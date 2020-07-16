<?php
/**
 * UserEditRequest.php
 * Created by: trainheartnet
 * Created at: 7/16/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $id = intval($this->route('id'));
        return [
            'username' => 'required|unique:users,username,'.$id.',id',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'repassword' => 'same:password'
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
            'repassword.same' => trans('user::user.repassword.same'),
        ];
    }
}
