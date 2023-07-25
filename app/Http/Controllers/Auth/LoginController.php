<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\loginRequest;

use App\Models\User;

class LoginController extends Controller
{
    public function Login(loginRequest $request){
    	$credentials = ['username' => $request['username'],'password' => $request['password']];
    	if(!auth()->attempt($credentials)){
    		return jsend_fail('invalid credentials');
    	}

    	$user = User::select('id')->where('username',$request['username'])->first();
    	$user->tokens()->delete();
    	$authToken = $user->createToken('auth-login-token')->plainTextToken;
    	return jsend_success(['token' => $authToken]);
    }
}
