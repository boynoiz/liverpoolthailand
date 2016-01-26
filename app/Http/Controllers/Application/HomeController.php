<?php

namespace LTF\Http\Controllers\Application;

use LTF\Base\Controllers\ApplicationController;

class HomeController extends ApplicationController
{
    /**
     * Show the application homepage to the user.
     *
     * @return Response
     */
    public function index()
    {
        $articles = $this->language
            ->articles()->published()
            ->orderBy('published_at', 'desc')
            ->paginate(5);
        return view('application.home.index', compact('articles'));
    }
}
