<?php

namespace LTF\Http\Controllers\Application;

use Facebook\Facebook;
use Jenssegers\Date\Date;
use LTF\Article;
use LTF\Base\Controllers\ApplicationController;
use LTF\Category;
use LTF\FootballMatches;
use LTF\FootballStanding;
use LTF\Gallery;
use LTF\Http\Requests;
use Debugbar;
use LTF\Member;
use LTF\Topic;


/**
 * Class MainController
 * @package LTF\Http\Controllers\Application
 */
class MainController extends ApplicationController
{


    /**
     * @param null $param
     * @return mixed
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
        $totalMembers = $this->getTotalMembers();
        $fbLikeCounter = $this->facebookLike();
        $Match = $this->UpComingMatch();
        $lastMatch = $this->LastMatch();
        $standing = $this->LeagueTable();

        Debugbar::stopMeasure('render');
        return view('application.home.default', compact('columnLatests', 'lastGalleryImages','latestTopics', 'latestTalk', 'latestNews', 'hotTopics', 'totalMembers', 'fbLikeCounter', 'Match', 'lastMatch', 'standing'));
    }

    /**
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
     * @return int
     */
    public function getTotalMembers()
    {
        return Member::whereMemberGroupId(3)->count();
    }

    /**
     * @return mixed
     */
    public function facebookLike()
    {
        $fbConfig = [
            'appId' => env('FACEBOOK_APP_ID', 'BlahBlahBlah'),
            'secret' => env('FACEBOOK_APP_SECRET', 'BlahBlahBlah'),
            'default_graph_version' => env('FACEBOOK_APP_GRAPH_VERSION', 'v2.5'),
            'default_access_token' => env('FACEBOOK_APP_TOKEN', 'BlahBlahBlah')
        ];
        $request = new Facebook($fbConfig);
        $response = $request->get('/liverpoolthailand?fields=likes');
        $countLiked = $response->getGraphPage()->getField('likes');

        return $countLiked;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public function UpComingMatch()
    {
        $match = FootballMatches::whereNotIn('status', ['FT', 'Postp.', 'AET'])
            ->orderBy('formatted_date', 'asc')
            ->first();
        return $match;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function LastMatch()
    {
        $match = FootballMatches::whereIn('status', ['FT', 'AET'])
            ->orderBy('formatted_date', 'desc')
            ->first();
        return $match;
    }

    /**
     * @return array|bool|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function LeagueTable()
    {
        $liverpool = FootballStanding::whereTeamId('9249')->first();
        $range = $liverpool->position - 3;
        if ($range <= 0)
        {
            return $range === 1;
        }
        $standing = FootballStanding::where('position', '>=', $range)
            ->select('*')
            ->orderBy('position', 'asc')
            ->take(7)
            ->get();
        
        return $standing;
    }
}
