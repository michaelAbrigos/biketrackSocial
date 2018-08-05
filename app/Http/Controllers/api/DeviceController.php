<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Response;
use App\Device;
use App\Device_user;
use App\Http\Requests\AddDevices;


class DeviceController extends Controller
{
    public function saveDevice(AddDevices $request)
    {
    	$validated = $request->validated();
        if($validated){
            $device = Device::with('users')->where('device_code','LIKE', $request->code)->first();
            //dd($device);        
            if (count($device) == 1) {
                $device->users()->attach(Auth::id());
                return Response::json($device);
            }else{
                return false;
            }
        }
    }

    public function removeDevice(){
    	
    }
}
