<?php

namespace LTF\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@createOrUpdateFixtures')->hourly();
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@createOrUpdateStanding')->hourly();
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@updateOrCreateComp')->weekly();
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@updateOrCreateTeams')->weekly();
    }
}
