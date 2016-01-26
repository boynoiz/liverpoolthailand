<?php

namespace LTF\Http\Controllers\Application;

use LTF\Base\Controllers\ApplicationController;
use LTF\Page;

class PageController extends ApplicationController
{
    /**
     * Show the page
     *
     * @param Page $page
     * @return Response
     */
    public function index(Page $page)
    {
        return view('application.page.index', compact('page'));
    }
}
