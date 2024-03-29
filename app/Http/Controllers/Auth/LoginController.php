<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

//    protected function redirectTo()
//    {
//        if(Auth::check() && Auth::user()->hasRole('Admin')){
//            return redirect('/overview');
//        }
//        elseif (Auth::check() && Auth::user()->hasRole('Service Marketing')) {
//            return redirect('/appointment');
//        }
//        elseif (Auth::check() && Auth::user()->hasRole('Job Controller')) {
//            return redirect('/jobctrlsheet');
//        }
//        else {
//            return view('pages.error');
//        }
//    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

}
