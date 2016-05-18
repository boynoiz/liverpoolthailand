<?php

namespace LTF\Http\Controllers\Application;

use Jenssegers\Date\Date;
use LTF\Base\Controllers\ApplicationController;
use LTF\Category;
use LTF\FootballMatches;
use LTF\FootballStanding;
use LTF\Gallery;
use LTF\Http\Requests;
use Debugbar;
use LTF\Topic;


/**
 * Class MainController
 * @package LTF\Http\Controllers\Application
 */
class MainController extends ApplicationController
{

    public $matches;

    /**
     * @var \LTF\Http\Controllers\Application\FacebookController
     */
    public $fbLikes;

    /**
     * @var \LTF\Http\Controllers\Application\IPBoardController
     */
    public $ipb;

    public function __construct(FacebookController $fbLikes, IPBoardController $ipb, FootballMatches $matches)
    {
        $this->matches = $matches;
        $this->fbLikes = $fbLikes;
        $this->ipb = $ipb;
    }

    /**
     * Collect all needed data for first page
     * @return Response
     */
    public function index()
    {
        Debugbar::startMeasure('render','Time for rendering');

        $latestTalk = $this->getLatestTalk();
        $hotTopics = $this->getHotTopics();
        $latestTopics = $this->getLatestTopics();
        $latestNews = $this->getLatestForum(4, 3);
        $columnLatests = $this->getLatestForum(22, 3);
        $lastGalleryImages = $this->getGelllery();
        $totalMembers = $this->ipb->getTotalMembers();
        $fbLikeCounter = $this->fbLikes->facebookLike();
        $lastMatch = $this->LastMatch();
        $standing = $this->LeagueTable();

        Debugbar::stopMeasure('render');
        return view('application.home.default', compact('columnLatests', 'lastGalleryImages','latestTopics', 'latestTalk', 'latestNews', 'hotTopics', 'totalMembers', 'fbLikeCounter', 'lastMatch', 'standing'));
    }

    /**
     * Get article data from 'LTF Talk' category to first page
     * @return mixed
     */
    public function getLatestTalk()
    {
        $category = Category::whereTitle('LTF Talk')->first();
        $talk = $category
            ->articles()
            ->published()
            ->orderBy('published_at', 'desc')
            ->take(1)
            ->get();

        return $talk;
    }

    /**
     * Get latest news or column topics from IPBoard
     * @param $forumID
     * @param $take
     * @return array|static[]
     */
    public function getLatestForum($forumID, $take)
    {
        $lastTopics = Topic::whereForumId($forumID)
            ->where('approved', 1)
            ->join('posts', 'topics.topic_firstpost', '=', 'posts.pid')
            ->leftJoin('attachments', 'topics.topic_firstpost', '=', 'attachments.attach_rel_id')
            ->select('topics.tid', 'topics.title', 'topics.posts', 'topics.views', 'topics.title_seo',
                'topics.topic_hasattach', 'topics.topic_firstpost', 'posts.post_date', 'posts.author_name',
                'posts.post', 'attachments.attach_location')
            ->orderBy('posts.post_date', 'desc')
            ->take($take)
            ->get();

        return $lastTopics;
    }

    /**
     * Get latest discussion topics from IPBoard
     * @return array|static[]
     */
    public function getLatestTopics()
    {
        $lastTopics = Topic::whereForumId(2)
            ->where('approved', 1)
            ->select('tid', 'title', 'posts', 'title_seo',
                'starter_name', 'start_date')
            ->orderBy('start_date', 'desc')
            ->take(5)
            ->get();

        return $lastTopics;
    }

    /**
     * Get topics from IPBoard that most comments in past a week
     * @return array|static[]
     */
    public function getHotTopics()
    {
        $subWeek = Date::now()->subWeek()->timestamp;
        $hotTopics = Topic::whereForumId(2)
            ->where('approved', 1)
            ->where('start_date', '>', $subWeek)
            ->select('title', 'posts', 'title_seo',
                'starter_name', 'start_date')
            ->orderBy('posts', 'desc')
            ->take(5)
            ->get();

        return $hotTopics;
    }

    /**
     * Get pictures from IPBoard's gallery
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getGelllery()
    {
        $gallery = Gallery::where('approved', 1)
            ->select('caption', 'directory', 'masked_file_name', 'medium_file_name')
            ->orderBy('idate', 'desc')
            ->take(15)
            ->get();

        return $gallery;
    }

    /**
     * Get game info from last match for display in first page
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function LastMatch()
    {
        $match = FootballMatches::whereIn('status', ['FT', 'AET'])
            ->whereDate('formatted_date', '<=', Date::today()->format('Y-m-d'))
            ->orderBy('formatted_date', 'desc')
            ->first();
        return $match;
    }

    /**
     * Get data from Standing for render short table in first page
     * @return array|bool|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function LeagueTable()
    {
        $liverpool = FootballStanding::whereTeamId('9249')->first();
        $getRank = $liverpool->position - 3;
        $rank =  $getRank <= 1 ? $getRank === 1 : $getRank;

        $standing = FootballStanding::where('position', '>=', $rank)
            ->select('*')
            ->orderBy('position', 'asc')
            ->take(7)
            ->get();
        
        return $standing;
    }
}
