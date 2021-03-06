<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;

class SchoolynkMiddaleware
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
        if( !Auth::user() ) {
            Flash::warning('You must login');
            return redirect('/');
        }
        if(Auth::user()->role != 2){
            Flash::warning('You don\'t have permistion!');
            return redirect('/');
        }
        return $next($request);
    }
}
