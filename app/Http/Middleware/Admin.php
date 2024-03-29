<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::user()->hasRole('Admin')){
            return $next($request);
        }
        else {
            return response(json_encode(['error' => 'Unauthorised']), 401)
                ->header('Content-Type', 'text/json');
        }
//        elseif (Auth::check() && Auth::user()->hasRole('Service Marketing')) {
//            return redirect('/appointment');
//        }
//        elseif (Auth::check() && Auth::user()->hasRole('Job Controller')) {
//            return redirect('/jobctrlsheet');
//        }
//        else{
//            return view('pages.error');
//        }

    }
}
