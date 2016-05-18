<?php

namespace LTF\Http\Controllers\Application;

use Illuminate\Http\Request;

use LTF\Member;
use LTF\Http\Requests;
use LTF\Http\Controllers\Controller;

class IPBoardController extends Controller
{
    /**
     * Count total members in IPBoard
     * @return int
     */
    public function getTotalMembers()
    {
        return Member::whereMemberGroupId(3)->count();
    }
}
