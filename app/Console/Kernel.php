<?php

namespace LTF\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use LTF\FootballMatches;
use Jenssegers\Date\Date;

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
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@LiveMatch')->everyMinute()->when(function()
        {
            $match = FootballMatches::whereNotIn('status', ['FT', 'Postp.'])
                ->whereDate('formatted_date', '>=', Date::yesterday()->format('Y-m-d'))
                ->orderBy('formatted_date', 'asc')
                ->first();
            $gameMinute = $match->status === 'AET' ? 180 : 105;
            $timeKickoff = Date::createFromFormat('Y-m-d H:i', $match->formatted_date . $match->time);
            $gameFinishTime = Date::createFromFormat('Y-m-d H:i', $match->formatted_date . $match->time)->addMinutes($gameMinute);

            return Date::now()->between($timeKickoff, $gameFinishTime) ? true : false;
        });
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@createOrUpdateStanding')->hourly();
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@createOrUpdateFixtures')->hourly();
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@updateOrCreateTeams')->daily();
        $schedule->call('LTF\Http\Controllers\Admin\FootballController@updateOrCreateComp')->weekly();
    }
}
