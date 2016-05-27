<?php

namespace LTF\Http\Requests\Admin;

use LTF\Http\Requests\Request;

class UserRequest extends Request
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
            'email'     => 'required|email|max:255|unique:users,email,'.$this->segment(3),
            'name'      => 'required|string|max:255',
            'password'  => 'sometimes|min:6|max:20|confirmed',
            'picture'   => 'sometimes|max:2048|image'
        ];
    }
}