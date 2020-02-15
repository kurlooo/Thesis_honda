<?php

namespace App\Http\Controllers\Api\Auth;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait IssueTokenTrait{

    public function issueToken(Request $request, $grantType)
    {
        $username = $request->input('username');
        $user = User::where('username',$username)->first();

        if($user->hasAnyRoles(['Checklister','Company Guard'])){
            $scope = 'android';
        }
        else{
            return response(json_encode(['error' => 'Unauthorised']), 401)
                ->header('Content-Type', 'text/json');
        }

        $params = [
            'grant_type' => $grantType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $request->username,
//            'password' => request('password'),
//            'redirect_uri' => 'http://localhost',
            'scopes' => $scope,
        ];



        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }

}


