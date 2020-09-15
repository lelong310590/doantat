<?php
/**
 * CreateBankRequest.php
 * Created by: trainheartnet
 * Created at: 9/16/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBankRequest extends FormRequest
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
            'bank_number' => 'required',
            'bank_number_check' => 'required|same:bank_number',
            'bank_holder' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'bank_name.required' => 'Tên ngân hàng không được bỏ trống',
            'bank_number.required' => 'Số tài khoản không được bỏ trống',
            'bank_number_check.required' => 'Số tài khoản kiểm tra không được bỏ trống',
            'bank_number_check.same' => 'Số tài khoản kiểm tra không trùng khớp',
            'bank_holder.required' => 'Họ tên chủ tài khoản không được bỏ trống'
        ];
    }
}
