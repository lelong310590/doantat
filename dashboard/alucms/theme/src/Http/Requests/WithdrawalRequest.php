<?php
/**
 * WithdrawalRequest.php
 * Created by: trainheartnet
 * Created at: 9/16/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WithdrawalRequest extends FormRequest
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
            'bank_name' => 'required',
            'amount' => 'required',
            'pay_password' => 'required'
        ];
    }
    /**
     * @return array
     */
    public function messages()
    {
        return [
            'bank_name.required' => 'Ngân hàng không được bỏ trống',
            'amount.required' => 'Số tiền không được bỏ trống',
            'amount.regex' => 'Định dạng số tiền không đúng',
            'pay_password.required' => 'Mật khẩu thanh toán không được bỏ trống'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'amount' => (int) (str_replace( ",", "", $this->get('amount')))
        ]);
    }
}
