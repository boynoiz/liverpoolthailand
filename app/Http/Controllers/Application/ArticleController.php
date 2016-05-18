<?php

namespace LTF\Http\Controllers\Application;

use LTF\Article;
use LTF\Events\ArticleWasViewed;
use LTF\Base\Controllers\ApplicationController;
use LTF\Http\Controllers\Application\FacebookController;
use LTF\Http\Controllers\Application\IPBoardController;
use Event;

class ArticleController extends ApplicationController
{
    /**
     * @var \LTF\Http\Controllers\Application\FacebookController
     */
    public $fbLikes;

    /**
     * @var \LTF\Http\Controllers\Application\IPBoardController
     */
    public $ipb;

    /**
     * ArticleController constructor.
     * @param \LTF\Http\Controllers\Application\FacebookController $fbLikes
     * @param \LTF\Http\Controllers\Application\IPBoardController $ipb
     */
    public function __construct(FacebookController $fbLikes, IPBoardController $ipb)
    {
        $this->fbLikes = $fbLikes;
        $this->ipb = $ipb;
    }

    /**
     * Show the article.
     *
     * @param Article $article
     * @return Response
     */
    public function index(Article $article)
    {
        Event::fire(new ArticleWasViewed($article));
        $fbLikeCounter = $this->fbLikes->facebookLike();
        $totalMembers = $this->ipb->getTotalMembers();
        return view('application.article.index', compact('article', 'fbLikeCounter', 'totalMembers'));
    }
}