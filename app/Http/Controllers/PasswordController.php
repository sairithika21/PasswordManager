<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Models
use App\Models\Password;
use App\Models\UserMasterPassword;

class PasswordController extends Controller
{
    public function create(Request $request){
        $user = $request->user();

        $master_password = UserMasterPassword::where('user_id',$user['id'])->latest()->first();

    	$password_info = [
    	"user_id"=> $user['id'],
		"website_id"=> $request->website_id,
		"email_id"=> $request->email_id,
		"username"=> $request->username,
		"password"=> $this->encrypt($master_password['master_password'],$request->password),
	   ];

	   $passwords=Password::create($password_info);

    	return $passwords;
    }
    public function get(Request $request){
        $user = $request->user();

        $master_password = UserMasterPassword::where('user_id',$user['id'])->latest()->first();

    	$passwords=Password::where('user_id',$request->user()['id'])->get();
        foreach ($passwords as $password) {
            $password['password'] = $this->decrypt($master_password['master_password'],$password['password']);
        }
    	return $passwords;
    }

    public function delete(){

    }

    public function update(){

    }

    public function getById(){

    }


    private function encrypt($master_password, $password){
        $privateKey     = env('APP_SALT');
        $secretKey      = $master_password;
        $encryptMethod  = env('APP_ENCRYPT');
        $string     = $password;

        $key     = hash('sha256', $privateKey);
        $ivalue  = substr(hash('sha256', $secretKey), 0, 16); 
        $result      = openssl_encrypt($string, $encryptMethod, $key, 0, $ivalue);
        $output = base64_encode($result);
        return $output;
    }

    private function decrypt($master_password, $encryptedPassword){
        $privateKey     = env('APP_SALT'); 
        $secretKey  = $master_password;
        $encryptMethod  = env('APP_ENCRYPT');
        $stringEncrypt  = $encryptedPassword; 
        $key    = hash('sha256', $privateKey);
        $ivalue = substr(hash('sha256', $secretKey), 0, 16); 
        return $output = openssl_decrypt(base64_decode($stringEncrypt), $encryptMethod, $key, 0, $ivalue);
    }
}
