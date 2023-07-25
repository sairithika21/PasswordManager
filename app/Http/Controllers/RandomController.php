<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Random;

class RandomController extends Controller
{
    public function encrypt(Request $request){
		$privateKey 	= env('APP_SALT'); // user define key
		$secretKey      = $request->master_password; // user define secret key
		$encryptMethod  = env('APP_ENCRYPT');
		$string 	= $request->message; // user define value

		$key     = hash('sha256', $privateKey);
		$ivalue  = substr(hash('sha256', $secretKey), 0, 16); // sha256 is hash_hmac_algo
		$result      = openssl_encrypt($string, $encryptMethod, $key, 0, $ivalue);
		$output = base64_encode($result);  // output is a encripted value
		return $output;
    }

    public function decrypt(Request $request){
		$privateKey 	= env('APP_SALT'); // user define key
		$secretKey 	= $request->master_password;; // user define secret key
		$encryptMethod  = env('APP_ENCRYPT');
		$stringEncrypt  = $request->encrypted_string; // user encrypt value
		$key    = hash('sha256', $privateKey);
		$ivalue = substr(hash('sha256', $secretKey), 0, 16); // sha256 is hash_hmac_algo
		return $output = openssl_decrypt(base64_decode($stringEncrypt), $encryptMethod, $key, 0, $ivalue);
    }
}
