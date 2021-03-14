<?php

namespace teaco\Http\Middleware;

use Closure;

class CheckRoles
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


        if(!(auth()->user()->hasRole('Admin'))){
            // die('you are not an admin');
            return redirect('/home')->with('danger', 'you are not an admin');
        }
        return $next($request);
    }
}
