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
        $authToken = $user->createToken('auth-login-token')->plainTextToken;
        $tokens = $user->tokens()->orderBy('created_at', 'desc')->get()->pluck('id');
        $activeLoginCount = 0;
        foreach ($tokens as $token) {
            $activeLoginCount++;
            if($activeLoginCount > config('auth.user.concurrent_logins')){
                $user->tokens()->where('id',$token)->delete();
            }
        }
    	return jsend_success(['token' => $authToken]);
    }
}
