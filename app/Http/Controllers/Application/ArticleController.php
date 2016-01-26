<?php

namespace LTF\Http\Controllers\Application;

use LTF\Article;
use LTF\Events\ArticleWasViewed;
use LTF\Base\Controllers\ApplicationController;
use Event;

class ArticleController extends ApplicationController
{
    /**
     * Show the article.
     *
     * @param Article $article
     * @return Response
     */
    public function index(Article $article)
    {
        Event::fire(new ArticleWasViewed($article));
        return view('application.article.index', compact('article'));
    }
}