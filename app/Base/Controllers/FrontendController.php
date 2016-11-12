<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use App\Language;

abstract class FrontendController extends Controller
{
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
