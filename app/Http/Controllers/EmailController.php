<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Requests
use App\Http\Requests\Emails\createRequest;

//Models
use App\Models\EmailProvider;
use App\Models\UserEmail;

class EmailController extends Controller
{

    protected $user;

    public function create(createRequest $request){
    	$this->user = $request->user();
    	if($this->check($this->user['id'],$request->email_id)){
    		return jsend_fail('The email is already associated with your account');
    	}else {
	    	$domain = substr($request->email_id, strpos($request->email_id, '@'));
	    	$email_provider = EmailProvider::where('email_domain',$domain)->first();
	    	if(!$email_provider){
	    		$website = substr($request->email_id, strpos($request->email_id, '@')+1);
	    		$email_provider = EmailProvider::create([
					'default' => 0,
					'company' => $website,
					'website' => $website,
					'user_id' => $this->user['id'],
					'email_domain' => $domain,
	    		]);
	    	}
	    	$userEmailData = [
	    		'user_id' => $this->user['id'],
	    		'email_id' => $request->email_id,
	    		'email_provider_id' => $email_provider['id'],
	    	];

	    	$userEmail = UserEmail::create($userEmailData);

	    	return jsend_success($userEmail);
    	}
    }

    public function delete(){

    }

    public function update(){

    }

    public function get(){

    }

    public function getById(){

    }

    private function check($userId, $emailId){
    	$useremail = UserEmail::where('user_id',$userId)->where('email_id',$emailId)->count();
    	if($useremail > 0){
    		return true;
    	}else {
    		return false;
    	}
    }
}
