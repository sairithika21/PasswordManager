<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devicesandlocation;

class DevicesandlocationController extends Controller
{
    public function devicedetails(Request $request){
    	$dl=[
    	    "user_id"=>$request->user_id,
            "ip_address"=>$request->ip_address,
            "location"=>$request->location,
            "device_type"=>$request->device_type,
            "active"=>$request->active,
			];
		$devices=Devicesandlocation::create($dl);

    	return $devices;
    }
}
