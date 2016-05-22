<?php

namespace LTF\Http\Controllers\Application;

use Illuminate\Http\Request;

use Jenssegers\Date\Date;
use Facebook\Facebook;
use LTF\Http\Requests;
use LTF\Http\Controllers\Controller;

class FacebookController extends Controller
{
    protected $fbConfig = [];

    public function __construct()
    {
        $this->fbConfig = [
            'appId' => env('FACEBOOK_APP_ID', 'BlahBlahBlah'),
            'secret' => env('FACEBOOK_APP_SECRET', 'BlahBlahBlah'),
            'default_graph_version' => env('FACEBOOK_APP_GRAPH_VERSION', 'v2.6'),
            'default_access_token' => env('FACEBOOK_APP_TOKEN', 'BlahBlahBlah')
        ];
    }

    /**
     * Request amount Likes of LTF Page from Facebook API
     * @return mixed
     */
    public function facebookLike()
    {
        $request = new Facebook($this->fbConfig);
        $response = $request->get('/118265851610459?fields=fan_count');
        $countLiked = $response->getGraphPage()->getField('fan_count');

        return $countLiked;
    }

    public function newsFeed()
    {
        $request = new Facebook($this->fbConfig);
        $response = $request->get('/118265851610459/posts')->getGraphEdge();
        $postFeeds = array_slice(json_decode($response), 0, 5, true);

        if (empty($postFeeds))
        {
            return $postFeeds = [
                'message' => 'Facebook connection timeout',
                'created_time' => [
                  'date' =>  Date::now()
                ],
                'id' => '118265851610459_118265851610459'
            ];
        }
        return $postFeeds;
    }
}
