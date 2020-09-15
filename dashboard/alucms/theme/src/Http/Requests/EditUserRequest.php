<?php
/**
 * EditUserRequest.php
 * Created by: trainheartnet
 * Created at: 9/16/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'new_password_check' => 'same:new_password',
            'pay_password_check' => 'same:pay_password',
            'new_paypassword_check' => 'same:new_paypassword'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'new_password_check.same' => 'Mật khẩu mới kiểm tra không trùng khớp',
            'pay_password_check.same' => 'Mật khẩu thanh toán không trùng khớp',
            'new_paypassword_check.same' => 'Mật khẩu thanh toán mới không trùng khớp',
        ];
    }
}
