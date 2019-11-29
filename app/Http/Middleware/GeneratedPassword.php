<?php

namespace App\Http\Middleware;

use Route;
use Closure;
use Illuminate\Support\Facades\Auth;

class GeneratedPassword
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
        if (Auth::guard($guard)->check() &&
          (Auth::user()->isGeneratedPassword()
          || Auth::user()->isGeneratedUser())) {
            return redirect()->route('change-password');
        }
        return $next($request);
    }
}
