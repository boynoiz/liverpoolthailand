<?php

namespace LTF\Http\Middleware;

use Closure;

class ApiAuthenticate
{

    /**
     * Handle an incoming api request.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->ajax()){
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
