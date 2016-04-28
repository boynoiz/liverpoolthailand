<?php

namespace LTF\Http\Controllers\Admin;

use Log;
use Jenssegers\Date\Date;
use GuzzleHttp\Client;
use Exception;
use LTF\FootballCompetition;
use LTF\FootballCupStanding;
use LTF\FootballMatches;
use LTF\FootballMatchEvents;
use LTF\FootballPlayer;
use LTF\FootballPlayerStats;
use LTF\FootballSetting;
use LTF\FootballStanding;
use LTF\FootballTeams;
use LTF\Http\Controllers\Api\DataTables\FixtureDataTable;
use LTF\Http\Controllers\Api\DataTables\PremierDataTable;
use LTF\Http\Requests;
use LTF\Http\Controllers\Controller;

class FootballController extends Controller
{
    /**
     * @var string
     */
    protected $apikey;

    /**
     * @var string
     */
    protected $baseuri;

    /**
     * @var string
     */
    protected $liverpoolfc;

    /**
     * @var string
     */
    protected $premierleague;

    /**
     * @var string
     */
    protected $facup;

    /**
     * @var string
     */
    protected $ucl;

    /**
     * @var string
     */
    protected $europa;

    /**
     * @var
     */
    protected $leaguecup;

    /**
     * @var string
     */
    protected $seasonStart;

    /**
     * @var string
     */
    protected $seasonEnd;

    /**
     * FootballController constructor.
     */
    public function __construct()
    {
        $this->apikey = env('FOOTBALL_API_KEY', 'BlahBlahBlah');
        $this->baseuri = 'http://api.football-api.com/2.0/';
        $this->liverpoolfc = '9249';
        $this->premierleague = '1204';
        $this->facup = '1198';
        $this->ucl = '1005';
        $this->europa = '1007';
        $this->seasonStart = '08.08.2015';
        $this->seasonEnd = '15.05.2016';
    }

    /**
     * 
     * @return array|string|static[]
     */
    public function LiveMatch()
    {
        $liveMatch = FootballMatches::where('formatted_date', '=>', Date::today())
            ->whereNotIn('status', ['FT', 'Postp.', 'AET'])
            ->whereRaw('status != time')
            ->first();

        return is_null($liveMatch) ? 'No live match on this time!' : $liveMatch;

    }
    /**
     * Show datatable of Standing in Admin Controller
     * @param PremierDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function showStanding(PremierDataTable $dataTable)
    {
        return $dataTable->render('admin.football.index');
    }

    /**
     * Show datatable of all Liverpool FC Fixtures in a season
     * @param FixtureDataTable $fixtureDataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function showFixtures(FixtureDataTable $fixtureDataTable)
    {
        return $fixtureDataTable->render('admin.football.fixtures');
    }

    /**
     * @param FootballMatchEvents $matchEvents
     */
    public function showEvents(FootballMatchEvents $matchEvents)
    {

    }

    /**
     * @param FootballCupStanding $cupStanding
     */
    public function showCupStanding(FootballCupStanding $cupStanding)
    {
        //
    }

    /**
     * @param FootballTeams $teams
     */
    public function showTeamInfo(FootballTeams $teams)
    {
        //
    }

    /**
     * @param FootballPlayer $player
     */
    public function showPlayer(FootballPlayer $player)
    {
        //
    }

    /**
     * @param FootballPlayerStats $playerStats
     * @param $id
     */
    public function showPlayerStats(FootballPlayerStats $playerStats, $id)
    {
        //
    }

    /**
     * @param FootballSetting $setting
     */
    public function showSetting(FootballSetting $setting)
    {
        //
    }

    /**
     * @param $action
     * @return bool
     * @throws Exception
     */
    public function connector($action)
    {
        $client = new Client([
            'base_uri'  => $this->baseuri,
            'timeout'   => 30.0,
            'exceptions' => false
        ]);
        $request = $client->get($action . 'Authorization=' . $this->apikey);
        $data = json_decode($request->getBody()->getContents(), true);
        return $data;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function createOrUpdateStanding()
    {
        $request = 'standings/' . $this->premierleague . '?';
        $getStanding = $this->connector($request);

        if (is_array($getStanding))
        {
            foreach ($getStanding as $team)
            {
                FootballStanding::updateOrCreate([
                    'team_id' => $team['team_id'],
                    'season' => $team['season']
                ], $team);
            }
        }
    }

    /**
     * @return string
     */
    public function createOrUpdateFixtures()
    {
        $dateOfBeginningMonth = Date::now()->startOfMonth()->format('d.m.Y');
        $dateOfEndingMonth = Date::now()->endOfMonth()->format('d.m.Y');

        $startSeason = Date::createFromFormat('d.m.Y', $this->seasonStart)->format('d.m.Y');
        $endSeason = Date::createFromFormat('d.m.Y', $this->seasonEnd)->format('d.m.Y');

        $today = Date::today()->format('d.m.Y');

        if (($today > $endSeason) and ($today < $startSeason))
        {
            return 'This time is ended of the season, Please wait until the new season start';
        }

        $request = 'matches?comp_id='
            . $this->premierleague . ','
            . $this->ucl . ','
            . $this->europa . ','
            . $this->facup
            . '&team_id='
            . $this->liverpoolfc
            . '&from_date='
            . $dateOfBeginningMonth
            . '&to_date='
            . $dateOfEndingMonth
            . '&';
        $getMatches = $this->connector($request);

        if (is_array($getMatches))
        {
            foreach ($getMatches as $match)
            {
                $match['match_id'] = $match['id'];
                unset($match['id']);

                $mergeDateTime = Date::createFromFormat('d.m.Y H:i',
                    $match['formatted_date'] .' '.
                    $match['time'], 'UTC')
                    ->tz('Asia/Bangkok')
                    ->toDateTimeString();
                $date = Date::createFromFormat('Y-m-d H:i:s', $mergeDateTime)
                    ->format('Y-m-d');
                $match['formatted_date'] = $date;
                $time = Date::createFromFormat('Y-m-d H:i:s', $mergeDateTime)
                    ->format('H:i');
                $matchStatus = $match['status'];
                $match['status'] === $match['time'] ? $match['status'] = $time : $match['status'] = $matchStatus;
                $match['time'] = $time;

                if (($match['localteam_score'] === '?' and $match['visitorteam_score'] === '?') or ($match['localteam_score'] === '' and $match['visitorteam_score'] === ''))
                {
                    if (($match['status'] !== 'FT') or ($match['status'] !== 'AET'))
                    {
                        $match['localteam_score'] = '-';
                        $match['visitorteam_score'] = '-';
                    }
                }
                FootballMatches::updateOrCreate([
                    'match_id' => $match['match_id'],
                ], $match);

                if (!empty($match['events']))
                {
                    $events = $match['events'];
                    $matchId = $match['match_id'];
                    $this->getMatchEvents($events, $matchId) ? Log::info('Event of ' .$matchId. ' update completed!.') : Log::error('Event update process of '.$matchId.' failed');
                }
                Log::info('All data of '.$match['match_id'].' update completed!');
            }
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $events
     * @param $matchId
     * @return string
     */
    public function getMatchEvents($events, $matchId)
    {
        foreach ($events as $event)
        {
            $event['match_id'] = $matchId;
            $event['event_id'] = $event['id'];
            unset($event['id']);

            FootballMatchEvents::updateOrCreate([
                'event_id' => $event['event_id'],
            ], $event);
        }
        return true;
    }

    /**
     * @param FootballMatchEvents $matchEvents
     * @return string
     */
    public function getAllMatchEvents(FootballMatchEvents $matchEvents)
    {
        $getMatchId = FootballMatches::select('match_id')->orderBy('match_id', 'asc')->get();
        foreach ($getMatchId as $matchId)
        {
            $request = 'matches/' . $matchId->match_id . '?';
            $getEvent = $this->connector($request);
            $events = $getEvent['events'];

            foreach ($events as $event)
            {
                $event['match_id'] = $matchId->match_id;
                $event['event_id'] = $event['id'];
                unset($event['id']);

                $matchEvents->updateOrCreate([
                    'event_id' => $event['event_id'],
                ], $event);
            }
        }
        return 'All Event update completed!';
    }

    /**
     * @return string
     */
    public function updateOrCreateTeams()
    {
        $getTeamIds = FootballMatches::select('localteam_id')->orderBy('localteam_id', 'asc')->get();
        foreach ($getTeamIds as $teamId)
        {
            $request = 'team/'.$teamId['localteam_id'].'?';
            $getTeamData = $this->connector($request);
            $getTeamData['is_national'] === 'False' ? $getTeamData['is_national'] = 0 : $getTeamData['is_national'] = 1;
            FootballTeams::updateOrCreate([
                'team_id' => $getTeamData['team_id']
            ], $getTeamData);
        }
        return "Teams update completed!";
    }

    /**
     * @return string
     */
    public function updateOrCreateComp()
    {
        $request = 'competitions?';
        $getCompetition = $this->connector($request);

        if (is_array($getCompetition))
        {
            foreach ($getCompetition as $comp)
            {
                $comp['comp_id'] = $comp['id'];
                unset($comp['id']);

                FootballCompetition::updateOrCreate([
                    'comp_id' => $comp['comp_id']
                ], $comp);
            }
        }
        return "All competition updated!";
    }
}
