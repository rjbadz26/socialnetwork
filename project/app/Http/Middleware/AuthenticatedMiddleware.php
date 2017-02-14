<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticatedMiddleware
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
        /*if(Auth::check()){
            return $next($request);
        }
        return redirect('/');*/

        /*if(Auth::check()){
            return redirect('/home');
        }
        return $next($request);*/

        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
        return $next($request);

    }
}
