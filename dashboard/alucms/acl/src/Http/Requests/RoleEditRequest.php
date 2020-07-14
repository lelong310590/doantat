<?php
/**
 * RoleEditRequest.php
 * Created by: trainheartnet
 * Created at: 7/14/20
 * Contact me at: longlengoc90@gmail.com
 */


namespace AluCMS\Acl\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleEditRequest extends FormRequest
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
            'name' => 'required|unique:roles,name,'.$id.',id',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('acl::acl.role.create.name.required'),
            'name.unique' => trans('acl::acl.role.create.name.unique'),
        ];
    }
}
