<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class LoginController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function  __construct()
    {
        $this->client =  Client::find(1);
    }

    public function login(Request $request)
    {
////        $client =  Client::find(2);
//        $username = $request->input('username');
//        $user = User::where('username',$username)->first();
//
//        $username = $request->input('username');
//        $user = User::where('username',$username)->first();
//
//        if($user->hasAnyRoles(['Checklister','Company Guard'])){
//            $scope = 'android';
//        }
//        else{
//            return response(json_encode(['error' => 'Unauthorised']), 401)
//                ->header('Content-Type', 'text/json');
//        }

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);



//        $params = [
//            'grant_type' => 'password',
//            'client_id' => $this->client->id,
//            'client_secret' => $this->client->secret,
//            'username' => request('username'),
//            'password' => request('password'),
////            'redirect_uri' => 'http://hcno.local/',
//            'scope' => '*',
//        ];
//
//        $request->request->add($params);
//
//        $proxy = Request::create('oauth/token', 'POST');
//
//        return Route::dispatch($proxy);

        return $this->issueToken($request,'password');
    }

    public function refresh(Request $request)
    {
        $this->validate($request,[
            'refresh_token' => 'required',
        ]);

//        $params = [
//            'grant_type' => 'refresh_token',
//            'client_id' => $this->client->id,
//            'client_secret' => $this->client->secret,
//            'username' => request('username'),
//            'password' => request('password'),
////            'redirect_uri' => 'http://localhost',
//            'scope' => '*',
//        ];
//
//        $request->request->add($params);
//
//        $proxy = Request::create('oauth/token', 'POST');
//
//        return Route::dispatch($proxy);

        return $this->issueToken($request,'refresh_token');
    }

    public function logout(Request $request)
    {
        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id',$accessToken->id)
            ->update(['revoked'=>true]);

        $accessToken->revoke();

        return response()->json([],204);
    }

//    public function authenticated(Request $request, $user)
//    {
//        $role = $user->roles();
//
//        if ($role == 'Admin'){
//            $request->request->add([
//                'scope' => 'android'
//            ]);
//        }
//
//        $tokenRequest = Request::create(
//            '/oauth/token',
//            'post'
//        );
//
//        return Route::dispatch($tokenRequest);
//    }
}

