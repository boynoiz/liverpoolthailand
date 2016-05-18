<?php

namespace LTF\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'LTF\Listeners\SetUserLoginCredentials',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'LTF\Listeners\SetUserLogoutCredentials',
        ],
        'LTF\Events\ArticleWasViewed' => [
            'LTF\Listeners\IncrementArticleViews',
        ],
        'LTF\Events\FootballMatchUpdated' => [
            'LTF\Listeners\SendDataToPusher'
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
