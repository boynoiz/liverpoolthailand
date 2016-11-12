<?php

namespace App\Http\Controllers\Frontend;

use App\Base\Controllers\FrontendController;
use Input;

class LanguageController extends FrontendController
{
    /**
     * Set the application language
     *
     * @return Response
     */
    public function postChange()
    {
        session(['language' => Input::get('language')]);
        return back();
    }
}
