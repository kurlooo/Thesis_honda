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
//    protected $redirectTo;

//    public function redirectTo()
//    {
//        switch (Auth::user()->hasRole($role)){
//            case 'Admin':
//                $this->redirectTo = '/appointment';
//                return $this->redirectTo;
//                break;
//            case 'Service Marketing':
//                $this->redirectTo = '/appointment';
//                return $this->redirectTo;
//                break;
//            case 'Job Controller':
//                $this->redirectTo = '/jobctrlsheet';
//                return $this->redirectTo;
//                break;
//            default:
//                $this->redirectTo = '/login';
//                return $this->redirectTo;
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
