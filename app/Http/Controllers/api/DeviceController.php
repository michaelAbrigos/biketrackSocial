<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;
use Response;
use App\Device;
use App\Device_user;
use App\Location;
use App\User;
use App\Http\Requests\AddDevices;


class DeviceController extends Controller
{
    
    public function storeCodeMobile(Request $request)
    {
            $device = Device::with('users')->where('device_code','LIKE', $request->code)->firstOrFail();
            //dd($device);        
            if ($device) {
                $device->users()->attach(Auth::id());
                return Response::json("Success",200);
            }else{
                return Response::json("Nope Bro",402);
            }
        
    }

    public function removeDevice(){
    	
    }

    public function retrieveLatestDeviceLocation(){
        $currentUser = User::where('id',Auth::id())->first();
        $hasDevice = $currentUser->devices()->where('id',Auth::id())->exists();
        
        if(!$hasDevice){
            return Response::json(False);
        }else{
            if ($currentUser->parent_id == null) {
                $user_device = User::with('devices')->where('id','=',Auth::id())->first();
                $dev_id =  $user_device->devices[0]->id;
            }else{
                $user_device = User::with('devices')->where('id','=',$currentUser->parent_id)->first();
                $dev_id =  $user_device->devices[0]->id;
            }
       
            $location = Location::where('device_id',$dev_id)->orderBy('created_at', 'desc')->get(['latitude','longitude'])->first();
            //dd($location);
            if(!$location){
                return Response::json(False);
            }else{
                return Response::json($location);
            }
        }
    }

    public function getDeviceFromUser(){
        $device = Device::whereHas('users', function($q){
            $q->where('id',Auth::id());
        })->get();
        return Response::json(['devices'=>$device],200);     
    }
}
