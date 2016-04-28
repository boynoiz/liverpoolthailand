<?php

namespace LTF\Http\Requests\Admin;

use LTF\Http\Requests\Request;

class FootballTeamsRequest extends Request
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
            'shortname'     => 'required|min:3|max:6',
            'country'       => 'sometimes',
            'founded'       => 'sometimes|date_format:Y',
            'leagues'       => 'sometimes',
            'venue_name'    => 'sometimes',
            'venue_city'    => 'sometimes',
            'venue_capcity' => 'sometimes|integer',
            'coach_name'    => 'sometimes',
            'image'          => 'sometimes|max:2048|image',
            'detail'        => 'sometimes'
        ];
    }
}
