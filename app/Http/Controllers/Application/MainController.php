<?php

namespace LTF\Http\Controllers\Application;

use Facebook\Facebook;
use LTF\Article;
use LTF\Base\Controllers\ApplicationController;
use LTF\Category;
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
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        DebugBar::startMeasure('render','Time for rendering');

        $latestTalk = $this->getLatestTalk();
        $columnLatests = $this->getLatestTopics();
        $lastGalleryImages = $this->getGelllery();
        $totalMembers = $this->getTotalMembers();
        $fbLikeCounter = $this->facebookLike();

        Debugbar::stopMeasure('render');
        return view('application.home.default', compact('columnLatests', 'lastGalleryImages', 'latestTalk', 'totalMembers', 'fbLikeCounter'));
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
     * @return array|static[]
     */
    public function getLatestTopics()
    {
        $lastTopics = Topic::where('forum_id', 22)
            ->where('approved', 1)
            ->join('posts', 'topics.topic_firstpost', '=', 'posts.pid')
            ->leftJoin('attachments', 'topics.topic_firstpost', '=', 'attachments.attach_rel_id')
            ->select('topics.tid', 'topics.title', 'topics.posts', 'topics.views', 'topics.title_seo',
                'topics.topic_hasattach', 'topics.topic_firstpost', 'posts.post_date', 'posts.author_name',
                'posts.post', 'attachments.attach_location')
            ->orderBy('posts.post_date', 'desc')
            ->take(2)
            ->get();

        return $lastTopics;
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
        $totalMembers = Member::whereMemberGroupId(3)
            ->count();

        return $totalMembers;
    }

    /**
     * @return mixed
     */
    public function facebookLike()
    {
        $fbConfig = [
            "appId" => env('FACEBOOK_APP_ID', 'BlahBlahBlah'),
            "secret" => env('FACEBOOK_APP_SECRET', 'BlahBlahBlah'),
            "default_graph_version" => env('FACEBOOK_APP_GRAPH_VERSION', 'v2.5'),
            "default_access_token" => env('FACEBOOK_APP_TOKEN', 'BlahBlahBlah')
        ];
        $request = new Facebook($fbConfig);
        $response = $request->get('/liverpoolthailand?fields=likes');
        $countLiked = $response->getGraphPage()->getField('likes');

        return $countLiked;
    }
}
