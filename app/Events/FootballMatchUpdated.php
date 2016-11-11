<?php

namespace App\Events;

use App\FootballMatches;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FootballMatchUpdated extends Event
{
    use SerializesModels;

    /**
     * @var FootballMatches
     */
    public $match;


    /**
     * FootballMatchUpdated constructor.
     * @param FootballMatches $matches
     * @return void
     */
    public function __construct(FootballMatches $matches)
    {
        $this->match = $matches;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['live-match'];
    }
}
