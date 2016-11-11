<?php

namespace App\Http\Controllers\Application;

use App\Category;
use App\Base\Controllers\ApplicationController;

class CategoryController extends ApplicationController
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
     * CategoryController constructor.
     * @param FacebookController $fbLikes
     * @param IPBoardController $ipb
     */
    public function __construct(FacebookController $fbLikes, IPBoardController $ipb)
    {
        $this->fbLikes = $fbLikes;
        $this->ipb = $ipb;
    }

    /**
     * Show the category articles
     *
     * @param Category $category
     * @return Response
     */
    public function index(Category $category)
    {
        $fbLikeCounter = $this->fbLikes->facebookLike();
        $totalMembers = $this->ipb->getTotalMembers();
        $articles = $category->articles()->published()->orderBy('published_at', 'desc')->paginate(5);
        return view('application.category.index', compact('articles', 'category', 'fbLikeCounter', 'totalMembers'));
    }
}
