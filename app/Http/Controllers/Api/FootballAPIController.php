<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\FootballMatches;
use Jenssegers\Date\Date;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FootballAPIController extends Controller
{
    public $matches;

    public function __construct(FootballMatches $matches)
    {
        $this->matches = $matches;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function live()
    {
        $match = $this->matches
            ->with(['events', 'competition', 'team_as_home', 'team_as_away'])
            ->whereNotIn('status', ['FT', 'Postp.'])
            ->whereDate('formatted_date', '>=', Date::yesterday()->format('Y-m-d'))
            ->orderBy('formatted_date', 'asc')
            ->first();

        return response()->json($match);
    }
}
