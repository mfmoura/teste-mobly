<?php

namespace Mobly\Http\Middleware;

use Closure;
use Auth;

class userLevel
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
        if (Auth::check()){
            if (Auth::user()->level == 1){
                return $next($request);
            }
            else{
                return redirect()->route('index.index');
            }
        }

        return redirect()->route('index.index');

    }
}
