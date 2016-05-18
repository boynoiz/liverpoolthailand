<?php

namespace LTF\Listeners;

use LTF\Http\Controllers\Api\FootballAPIController;
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
     * @var FootballAPIController
     */
    public $api;

    /**
     * Create the event listener.
     *
     * @param PusherManager $pusher
     * @param FootballAPIController $api
     * @return void
     */
    public function __construct(PusherManager $pusher, FootballAPIController $api)
    {
        $this->pusher = $pusher;
        $this->api = $api;
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
            $match = $this->api->live();
            $this->pusher->trigger('live-match', 'new-match', ['match' => $match->getData()]);
        }
    }
}
