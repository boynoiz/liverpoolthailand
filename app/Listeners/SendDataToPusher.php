<?php

namespace LTF\Listeners;

use LTF\FootballMatches;
use LTF\Http\Controllers\Api\FootballMatchController;
use Date;
use LTF\Events\FootballMatchUpdated;
use Vinkla\Pusher\PusherManager;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDataToPusher
{
    /**
     * @var PusherManager
     */
    public $pusher;

    /**
     * @var FootballMatches
     */
    public $matches;
    /**
     * Create the event listener.
     *
     * @param PusherManager $pusher
     * @param FootballMatches $matches
     * @return void
     */
    public function __construct(PusherManager $pusher, FootballMatches $matches)
    {
        $this->pusher = $pusher;
        $this->matches = $matches;
    }

    /**
     * Handle the event.
     *
     * @param FootballMatchUpdated  $event
     * @return mixed
     */
    public function handle(FootballMatchUpdated $event)
    {
        if ($event->match)
        {
            $match = $this->matches
                ->with(['events', 'competition', 'team_as_home', 'team_as_away'])
                ->whereNotIn('status', ['FT', 'Postp.'])
                ->whereDate('formatted_date', '>=', Date::yesterday()->format('Y-m-d'))
                ->orderBy('formatted_date', 'asc')
                ->first();

            $this->pusher->trigger('live-match', 'new-match', ['match' => $match->toArray()]);
        }
    }
}
