<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\UserMasterPassword;

//Requests
use App\Http\Requests\MasterPassword\createRequest;

class MasterPasswordController extends Controller
{
    //

    public function create(createRequest $request){
    	$user = $request->user();
    	$master_password = UserMasterPassword::where('user_id',$user['id'])->count();
    	if($master_password == 0){
	    	UserMasterPassword::create([
	    		'user_id' => $user['id'],
	    		'master_password' => $request->master_password,
	    		'master_password_hash' => bcrypt('$request->master_password'),
	    	]);

	    	return jsend_success('master password added successfully');
    	} else {
    		return jsend_fail('you already have a master password');
    	}

    }

    public function delete(Request $request){

    }

    public function get(Request $request){

    }

    public function update(Request $request){
    	
    }
}
