<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;


class AddressController extends Controller
{
    public function useraddress(Request $request){
    	$address_info=[
    	"user_id"=>$request->user_id,
    	"line_no"=>$request->line_no,
		"street"=>$request->street,
		"county"=>$request->county,
		"state"=>$request->state,
		"country"=>$request->country,
		"zipcode"=>$request->zipcode,
	];
	$addr=Address::create($address_info);
    	return $addr;
    }
}
