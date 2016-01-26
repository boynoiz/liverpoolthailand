<?php

namespace LTF\Http\Middleware\Custom;

use Closure;
use Config;
use LTF\Setting;

class SetConfiguration
{
    public function __construct()
    {
        //
    }

    /**
     * Set settings and language
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Config::set(['settings' => Setting::firstOrFail()]);
        return $next($request);
    }
}
