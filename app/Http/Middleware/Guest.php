<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Guest
{
    public function handle(Request $request, Closure $next, string ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                return redirect()->route('home.index');
            }
        }

        return $next($request);
    }
}
