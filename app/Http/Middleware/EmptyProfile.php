<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmptyProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
        if (Auth::guard($guard)->check() && Auth::user()->isEmpty()) {
            return redirect()->route($guard . '.cabinet.index');
        }
        return $next($request);
    }
}
