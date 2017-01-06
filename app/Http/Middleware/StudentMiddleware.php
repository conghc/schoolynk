<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;
use Route;

class StudentMiddleware
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
            return redirect()->route('index');
        }
        if( Auth::user()->role != 0){
            // Auth::logout();
            Flash::warning('You don\'t have permistion!');
            return redirect('/');
        }

        if( !Auth::user()->student->is_verify  ){
            if( Route::is('student.register-2') ) return $next($request);
            return redirect()->route('student.register-2');
        }

        if( !Auth::user()->student->is_update  ){
            if( Route::is('student.register-3') ) return $next($request);
            return redirect()->route('student.register-3');
        }

        return $next($request);
    }
}
