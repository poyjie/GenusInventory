<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class checkUserLogin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()) {
              return $next($request);
        } else {
            return redirect()->route('userlogin')->with('msg','You are not allowed to access this system');
        }
    }
}
