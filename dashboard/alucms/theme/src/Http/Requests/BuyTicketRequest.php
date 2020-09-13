<?php
/**
 * BuyTicketRequest.php
 * Created by: trainheartnet
 * Created at: 9/13/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Theme\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyTicketRequest extends FormRequest
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
            'tickets' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'tickets.required' => 'Có lỗi xẩy ra trong quá trình thực thi',
        ];
    }
}
