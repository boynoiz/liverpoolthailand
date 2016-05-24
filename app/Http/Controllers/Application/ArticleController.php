<?php

namespace LTF\Http\Controllers\Application;

use LTF\Article;
use LTF\Events\ArticleWasViewed;
use LTF\Base\Controllers\ApplicationController;
use Event;

class ArticleController extends ApplicationController
{
    /**
     * @var FacebookController
     */
    protected $fbLikes;

    /**
     * @var IPBoardController
     */
    protected $ipb;

    /**
     * @var
     */
    protected $language;

    /**
     * ArticleController constructor.
     * @param FacebookController $fbLikes
     * @param IPBoardController $ipb
     */
    public function __construct(FacebookController $fbLikes, IPBoardController $ipb)
    {
        $this->fbLikes = $fbLikes;
        $this->ipb = $ipb;
        $this->language = session('current_lang');
    }

    /**
     * List all the article in Article Page
     *
     * @return mixed
     */
    public function index()
    {
        $articles = $this->language->articles()->published()->orderBy('published_at', 'desc')->paginate(5);
        $fbLikeCounter = $this->fbLikes->facebookLike();
        $totalMembers = $this->ipb->getTotalMembers();
        return view('application.article.index', compact('articles', 'fbLikeCounter', 'totalMembers'));
    }

    /**
     * Show the article.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        Event::fire(new ArticleWasViewed($article));
        $fbLikeCounter = $this->fbLikes->facebookLike();
        $totalMembers = $this->ipb->getTotalMembers();
        return view('application.article.show', compact('article', 'fbLikeCounter', 'totalMembers'));
    }
}