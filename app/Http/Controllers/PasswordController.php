<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;

class PasswordController extends Controller
{
    public function create(Request $request){

    	$password_info = [
    	"user_id"=> $request->user()['id'],
		"website_id"=> $request->website_id,
		"email_id"=> $request->email_id,
		"username"=> $request->username,
		"password"=> $this->encrypt('master',$request->password),
        //"decrypted" => $this->decrypt('master',$this->encrypt('master',$request->password))
	];
    //return $password_info;
	$passwords=Password::create($password_info);

    	return $passwords;
    }
    public function get(){
    	$passwords=Password::get();
    	return $passwords;
    }

    public function delete(){

    }

    public function update(){

    }

    public function getById(){

    }


    public function encrypt($master_password, $password){
        $privateKey     = env('APP_SALT');
        $secretKey      = $master_password;
        $encryptMethod  = env('APP_ENCRYPT');
        $string     = $password;

        $key     = hash('sha256', $privateKey);
        $ivalue  = substr(hash('sha256', $secretKey), 0, 16); // sha256 is hash_hmac_algo
        $result      = openssl_encrypt($string, $encryptMethod, $key, 0, $ivalue);
        $output = base64_encode($result);  // output is a encripted value
        return $output;
    }

    public function decrypt($master_password, $encrypted_password){
        $privateKey     = env('APP_SALT'); // user define key
        $secretKey  = $master_password;; // user define secret key
        $encryptMethod  = env('APP_ENCRYPT');
        $stringEncrypt  = $encrypted_password; // user encrypt value
        $key    = hash('sha256', $privateKey);
        $ivalue = substr(hash('sha256', $secretKey), 0, 16); // sha256 is hash_hmac_algo
        return $output = openssl_decrypt(base64_decode($stringEncrypt), $encryptMethod, $key, 0, $ivalue);
    }
}
