<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobCtrl
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->hasRole('Job Controller')){
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->hasRole('Service Marketing')) {
            return redirect('/appointment');
        }
        elseif (Auth::check() && Auth::user()->hasRole('Admin')) {
            return redirect('/overview');
        }
        else {
            return view('pages.error');
        }
    }
}
