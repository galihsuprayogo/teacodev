<?php

namespace teaco\Http\Middleware;

use Closure;

class MenuMiddleware
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
        // if(!(auth()->user()->hasAnyRole(['Admin', 'Kasir'])))
        // {
        //     return redirect('/home')->with('danger', 'you do not have an access that page');
        // }
        if(!(auth()->user()->hasAnyPermission(['create menu'])))
        {
          return redirect('/home')->with('danger', 'you do not have an access that page');   
        }

        return $next($request);
    }
}
