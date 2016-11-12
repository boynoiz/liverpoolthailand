<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use Facebook\Facebook;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FacebookController extends Controller
{
    /**
     * @var array
     */
    protected $fbConfig = [];

    /**
     * @var string
     */
    protected $pageId;

    /**
     * FacebookController constructor.
     */
    public function __construct()
    {
        $this->fbConfig = [
            'appId' => env('FACEBOOK_APP_ID', 'BlahBlahBlah'),
            'secret' => env('FACEBOOK_APP_SECRET', 'BlahBlahBlah'),
            'default_graph_version' => env('FACEBOOK_APP_GRAPH_VERSION', 'v2.6'),
            'default_access_token' => env('FACEBOOK_APP_TOKEN', 'BlahBlahBlah')
        ];
        $this->pageId = '/118265851610459';
    }

    /**
     * Request amount Likes of LTF Page from Facebook API
     * @return mixed
     */
    public function facebookLike()
    {
        $request = new Facebook($this->fbConfig);
        $response = $request->get($this->pageId.'?fields=fan_count');
        $countLiked = $response->getGraphPage()->getField('fan_count');

        return $countLiked;
    }

    /**
     * @return array|mixed
     */
    public function newsFeed()
    {
        $request = new Facebook($this->fbConfig);
        $response = $request->get($this->pageId.'/posts?limit=5');
        $postFeeds = json_decode($response->getGraphEdge()->asJson());

        return $postFeeds;
    }
}
