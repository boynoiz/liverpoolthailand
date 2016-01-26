<?php

namespace LTF\Base\Controllers;

use LTF\Http\Controllers\Controller;
use LTF\Language;

abstract class ApplicationController extends Controller
{
    /**
     * Current language
     *
     * @var mixed
     */
    protected $language;

    /**
     * ApplicationController constructor.
     */
    public function __construct()
    {
        $this->language = session('current_lang');
    }

    /**
     * Get select list for languages
     *
     * @return mixed
     */
    protected function getSelectList()
    {
        return Language::pluck('title', 'id')->all();
    }
}
