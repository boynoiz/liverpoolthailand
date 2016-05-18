<?php

namespace LTF\Providers;

use Illuminate\Support\ServiceProvider;
use Log;

class LaravelLoggerProxy
{
    public function log($msg)
    {
        Log::info($msg);
    }
}
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pusher = $this->app->make('pusher');
        $pusher->set_logger(new LaravelLoggerProxy());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'dev') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
        }
    }
}
