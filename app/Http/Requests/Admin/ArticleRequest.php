<?php

namespace LTF\Http\Requests\Admin;

use LTF\Http\Requests\Request;

class ArticleRequest extends Request
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
            'category_id'   => 'required|integer',
            'content'       => 'required',
            'published_at'  => 'required|date',
            'title'         => 'required|min:3',
            'image'         => 'sometimes|max:2048|image',
        ];
    }
}
