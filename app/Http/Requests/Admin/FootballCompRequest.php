<?php

namespace LTF\Http\Requests\Admin;

use LTF\Http\Requests\Request;

class FootballCompRequest extends Request
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
            'name'          => 'sometimes',
            'logo'          => 'sometimes|max:2048|image',
        ];
    }
}
