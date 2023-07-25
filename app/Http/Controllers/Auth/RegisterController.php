<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\createUserRequest;
use App\Http\Requests\Auth\usernameRequest;

use App\Models\User;

class RegisterController extends Controller
{
    public function SignUp(createUserRequest $request){
        if($this->checkUserExists($request)){
            return jsend_fail([
                "title" => "User Already Exists",
                "body" => "User Already Registered with this email. Please try to login or Reset Password to Regain control over your account."
            ]);
        }else{
            $userinfo=[
                "first_name"=> $request->first_name,
                "last_name"=> $request->last_name,
                "email_id"=> $request->email_id,
                "phone_no"=> $request->phone_no,
                "country_code"=> $request->country_code,
                "username"=> $request->username,
                "password"=> bcrypt($request->password),
            ];

            //create a user with the given information using User Model
            $user=User::create($userinfo);
            
            return jsend_success($user);
        }
    }

    public function checkUsername(usernameRequest $request){
        $user = User::where('username',$request->username)->count();
        if ($user == 1) {
            return jsend_fail([
                "title" => "Username Taken",
                "body" => "Username is already registered please try another username",
            ]);
        }else{
            return jsend_success([
                "title" => "Username Available",
                "body" => "Yayy the selected Username is available, Please hurry inorder to not loose this username :-)",
            ]);
        }
    }


    private function checkUserExists($registerdata){
        $users = User::where('email_id',$registerdata->email_id)->count();
        if ($users == 1) {
            return true;
        }else{
            return false;
        }
    }

}
