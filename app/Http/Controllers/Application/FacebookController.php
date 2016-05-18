<?php

namespace LTF\Http\Controllers\Application;

use Illuminate\Http\Request;

use Facebook\Facebook;
use LTF\Http\Requests;
use LTF\Http\Controllers\Controller;

class FacebookController extends Controller
{
    /**
     * Request amount Likes of LTF Page from Facebook API
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
}
