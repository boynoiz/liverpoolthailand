<?php

namespace App\Http\Controllers\Frontend;

use Jenssegers\Date\Date;
use App\Article;
use App\Base\Controllers\FrontendController;
use App\Category;
use App\FootballMatches;
use App\FootballStanding;
use App\Gallery;
use App\Http\Requests;
use App\Topic;


/**
 * Class MainController
 * @package App\Http\Controllers\Application
 */
class MainController extends FrontendController
{

    /**
     * @var FootballMatches
     */
    public $matches;

    /**
     * @var \App\Http\Controllers\Frontend\FacebookController
     */
    public $facebook;

    /**
     * @var \App\Http\Controllers\Frontend\IPBoardController
     */
    public $ipb;

    /**
     * MainController constructor.
     * @param FacebookController $facebook
     * @param IPBoardController $ipb
     * @param FootballMatches $matches
     */
    public function __construct(FacebookController $facebook, IPBoardController $ipb, FootballMatches $matches)
    {
        $this->matches = $matches;
        $this->facebook = $facebook;
        $this->ipb = $ipb;
    }

    /**
     * Collect all needed data for first page
     * @return Response
     */
    public function index()
    {
        $latestTalk = $this->getLatestTalk();
        $hotTopics = $this->getHotTopics();
        $latestTopics = $this->getLatestTopics();
        $latestNews = $this->getLatestForum(4, 3);
        $columnLatests = $this->getLatestForum(22, 3);
        $lastGalleryImages = $this->getGelllery();
        $totalMembers = $this->ipb->getTotalMembers();
        $fbLikeCounter = $this->facebook->facebookLike();
        $lastMatch = $this->LastMatch();
        $standing = $this->LeagueTable();
        $fbFeeds = $this->facebook->newsFeed();

        return view('application.home.default', compact(
            'columnLatests', 'lastGalleryImages','latestTopics',
            'latestTalk', 'latestNews', 'hotTopics', 'totalMembers',
            'fbLikeCounter', 'lastMatch', 'standing',
            'fbFeeds'));
    }

    /**
     * Get article data from 'LTF Talk' category to first page
     * @return mixed
     */
    public function getLatestTalk()
    {
        $category = 'LTF Talk';
        $talk = Article::with(['category', 'user'])->whereHas('category', function ($query) use ($category) {
            $query->where('title', '=', $category);
        })
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
            ->leftJoin(
                'attachments',
                'topics.topic_firstpost',
                '=',
                'attachments.attach_rel_id'
            )
            ->select(
                'topics.tid',
                'topics.title',
                'topics.posts',
                'topics.views',
                'topics.title_seo',
                'topics.topic_hasattach',
                'topics.topic_firstpost',
                'posts.post_date',
                'posts.author_name',
                'posts.post',
                'attachments.attach_location'
            )
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
            ->select('tid','title', 'posts', 'title_seo',
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
        $liverpool = FootballStanding::whereSeason('2016/2017')->whereTeamId('9249')->first();
        $getRank = $liverpool->position - 3;
        $rank =  $getRank <= 1 ? $getRank === 1 : $getRank;

        $standing = FootballStanding::whereSeason('2016/2017')->where('position', '>=', $rank)
            ->select('season', 'team_id', 'team_name', 'position', 'overall_gp', 'gd', 'points')
            ->orderBy('position', 'asc')
            ->take(7)
            ->get();

        return $standing;
    }
}
