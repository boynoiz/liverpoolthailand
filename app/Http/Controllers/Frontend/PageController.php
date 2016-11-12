<?php

namespace App\Http\Controllers\Frontend;

use App\Base\Controllers\FrontendController;
use App\Page;

class PageController extends FrontendController
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
     * PageController constructor.
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
     * Show the page
     *
     * @param Page $page
     * @return Response
     */
    public function index(Page $page)
    {
        $fbLikeCounter = $this->fbLikes->facebookLike();
        $totalMembers = $this->ipb->getTotalMembers();
        return view('application.page.index', compact('page', 'fbLikeCounter', 'totalMembers'));
    }
}
