<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;

class AdminMiddleware
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
            return redirect()->route('admin.index');
        }
        if(Auth::user()->role == 0 || Auth::user()->role == 3){
            Flash::warning('You don\'t have permistion!');
            return redirect()->route('admin.index');
        }
        return $next($request);
    }
}
