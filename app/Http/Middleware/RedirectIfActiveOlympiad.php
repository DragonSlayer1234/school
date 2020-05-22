<?php

namespace App\Http\Middleware;

use Closure;
use App\Olympiad;
use Illuminate\Support\Facades\Auth;

class RedirectIfActiveOlympiad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('student')->check() &&
            $request->olympiad->isActive()) {
            return redirect()->route('student.olympiad.show', $request->olympiad);
        }
        return $next($request);
    }
}
