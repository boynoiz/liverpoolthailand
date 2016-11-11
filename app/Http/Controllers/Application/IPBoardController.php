<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;

use App\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
