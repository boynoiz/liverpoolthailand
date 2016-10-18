<?php

namespace LTF\Http\Controllers\Admin;

use Log;
use Event;
use LTF\Events\FootballMatchUpdated;
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
     * @var FootballCompetition|FootballMatches|FootballMatchEvents|FootballStanding|FootballTeams|string
     */
    protected $apikey, $baseuri, $liverpoolfc, $premierleague, $facup, $ucl,
        $europa, $leaguecup, $seasonStart, $seasonEnd, $footballMatches,
        $footballMatchEvents, $standing, $competition, $footballTeams;

    /**
     * FootballController constructor.
     * @param FootballMatches $footballMatches
     * @param FootballMatchEvents $footballMatchEvents
     * @param FootballStanding $standing
     * @param FootballCompetition $competition
     * @param FootballTeams $footballTeams
     * 
     */
    public function __construct(
        FootballMatches $footballMatches,
        FootballMatchEvents $footballMatchEvents,
        FootballStanding $standing,
        FootballCompetition $competition,
        FootballTeams $footballTeams
    ){
        $this->apikey = env('FOOTBALL_API_KEY', 'BlahBlahBlah');
        $this->baseuri = 'http://api.football-api.com/2.0/';
        $this->liverpoolfc = '9249';
        $this->premierleague = '1204';
        $this->facup = '1198';
        $this->ucl = '1005';
        $this->europa = '1007';
        $this->seasonStart = '13.08.2016';
        $this->seasonEnd = '21.05.2017';
        $this->footballMatches = $footballMatches;
        $this->footballMatchEvents = $footballMatchEvents;
        $this->standing = $standing;
        $this->competition = $competition;
        $this->footballTeams = $footballTeams;
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
        $startSeason = Date::createFromFormat('d.m.Y', $this->seasonStart);
        $endSeason = Date::createFromFormat('d.m.Y', $this->seasonEnd);
        $today = Date::now();

        if (!$today->between($startSeason, $endSeason)) {
            Log::error('This time is ended of the season, Please wait until the new season start');
            return false;
        }

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

        foreach ($getStanding as $team) {
            $this->standing->updateOrCreate([
                'team_id' => $team['team_id'],
                'season' => $team['season']
            ], $team);
        }
        return Log::info('Standing data update completed!');
    }


    /**
     * @return array|null
     */
    public function createOrUpdateFixtures()
    {
        $today = Date::now()->format('d.m.Y');
        $nextThirtyDays = Date::now()->addMonth()->format('d.m.Y');
//        $dateOfBeginningMonth = Date::now()->startOfMonth()->format('d.m.Y');
//        $dateOfEndingMonth = Date::now()->endOfMonth()->format('d.m.Y');

        $request = 'matches?comp_id='
            . $this->premierleague . ','
            . $this->ucl . ','
            . $this->europa . ','
            . $this->facup
            . '&team_id='
            . $this->liverpoolfc
            . '&from_date='
            . $today
            . '&to_date='
            . $nextThirtyDays
            . '&';
        $getMatches = $this->connector($request);

        foreach ($getMatches as $match) {
            $match['match_id'] = $match['id'];
            unset($match['id']);

            $mergeDateTime = Date::createFromFormat('d.m.Y H:i',
                $match['formatted_date'] . ' ' .
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

            if (($match['localteam_score'] === '?' and $match['visitorteam_score'] === '?') or ($match['localteam_score'] === '' and $match['visitorteam_score'] === '')) {
                if (($match['status'] !== 'FT') or ($match['status'] !== 'AET')) {
                    $match['localteam_score'] = '-';
                    $match['visitorteam_score'] = '-';
                }
            }
            $this->footballMatches->updateOrCreate([
                'match_id' => $match['match_id'],
            ], $match);

            if (!empty($match['events'])) {
                $events = $match['events'];
                $matchId = $match['match_id'];
                foreach ($events as $event) {
                    $event['match_id'] = $matchId;
                    $event['event_id'] = $event['id'];
                    unset($event['id']);

                    $this->footballMatchEvents->updateOrCreate([
                        'event_id' => $event['event_id'],
                    ], $event) ?
                        Log::info('Event of ' . $matchId . ' update completed!.') :
                        Log::error('Event update process of ' . $matchId . ' failed');
                }
            }
            Log::info('All data of ' . $match['match_id'] . ' update completed!');
        }
        return Event::fire(new FootballMatchUpdated($this->footballMatches));
    }


    /**
     * @return string
     */
    public function updateOrCreateTeams()
    {

        $getLocalTeamIds = $this->footballMatches->select('localteam_id')->orderBy('localteam_id', 'asc')->get()->toArray();
        $getVisitorTeamIds = $this->footballMatches->select('visitorteam_id')->orderBy('visitorteam_id', 'asc')->get()->toArray();
        $teamIds = collect([$getLocalTeamIds, $getVisitorTeamIds])->flatten()->unique();

        foreach ($teamIds as $teamId) {
            $request = 'team/' . $teamId . '?';
            $teamData = $this->connector($request);
            $teamData['is_national'] === 'False' ? $teamData['is_national'] = 0 : $teamData['is_national'] = 1;
            $this->footballTeams->updateOrCreate([
                'team_id' => $teamData['team_id']
            ], $teamData) ?
                Log::info('Team ' . $teamData['name'] . ' update completed!') :
                Log::error('Updating process of ' . $teamData['name'] . ' failed');
        }
        return Log::info('All the teams from the fixtures has completed update!');
    }

    /**
     * @return string
     */
    public function updateOrCreateComp()
    {
        $request = 'competitions?';
        $getCompetition = $this->connector($request);

        foreach ($getCompetition as $comp) {
            $comp['comp_id'] = $comp['id'];
            unset($comp['id']);

            $this->competition->updateOrCreate([
                'comp_id' => $comp['comp_id']
            ], $comp) ?
                Log::info('Team '.$comp['comp_id'].' update completed!') :
                Log::error('Updating process of '.$comp['comp_id'].' failed');
        }
        return Log::info('All the competition has completed update!');
    }

    /**
     *
     * @return array|string|static[]
     */
    public function LiveMatch()
    {
        $getMatchId = $this->footballMatches->whereNotIn('status', ['FT', 'Postp.'])
            ->whereDate('formatted_date', '>=', Date::yesterday()->format('Y-m-d'))
            ->orderBy('formatted_date', 'asc')
            ->first();

        $request = 'matches/'.$getMatchId['match_id'].'?';
        $match = $this->connector($request);

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

        if (($match['localteam_score'] === '?' and $match['visitorteam_score'] === '?') or ($match['localteam_score'] === '' and $match['visitorteam_score'] === '')) {
            if (($match['status'] !== 'FT') or ($match['status'] !== 'AET')) {
                $match['localteam_score'] = '-';
                $match['visitorteam_score'] = '-';
            }
        }
        $this->footballMatches->updateOrCreate([
            'match_id' => $match['match_id'],
        ], $match);

        if (!empty($match['events'])) {
            $matchEvents = $match['events'];
            $matchId = $match['match_id'];
            foreach ($matchEvents as $matchEvent) {
                $matchEvent['match_id'] = $matchId;
                $matchEvent['event_id'] = $matchEvent['id'];
                unset($matchEvent['id']);

                $this->footballMatchEvents->updateOrCreate([
                    'event_id' => $matchEvent['event_id'],
                ], $matchEvent) ?
                    Log::info('Event of ' .$matchId. ' update completed!.') :
                    Log::error('Event update process of '.$matchId.' failed');
            }
        }
        Event::fire(new FootballMatchUpdated($this->footballMatches));
        return Log::info('All data of '.$match['match_id'].' update completed!');
    }
}
