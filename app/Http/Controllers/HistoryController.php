<?php

namespace App\Http\Controllers;
use App\History;
use App\User;
use Response;
use Auth;
use App\Location;
use App\Device;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public static $id;
    
    public function checkUserParent(){
        $user = User::find(Auth::id());
        if(($user->parent_id) == 0){
            $id = Auth::id();
        }else{
            $id = $user->parent_id;
        }

        return $id;
    }
    //saves history for non-device users
    public function saveHistory(Request $request){

        $history = new History;
        $history->latitude =  $request->latitude;
        $history->longitude =  $request->longitude;
        $history->user_id = Auth::id();
        $history->save();

        if($history){
            return Response::json('Successfully added location',200);
        }else{
            return Response::json('Failed to save location',500);
        }
        
    }

    public function rangeHistory(Request $request){
        if($request->has('start') && $request->has('end')){
            $location = Location::where('device_id',$request->device_id)->whereBetween('created_at',[$request->start,$request->end])->get();
        }else{
            return Response::json($request->end,422);
        }
        
        return Response::json($location,200);
    }

    public function showHistoryView(){
        //$user = User::with('devices')->find(2);
        //dd($user);
        $device = Device::whereHas('users', function($q){
            $q->where('id',Auth::id());
        })->first();


        return view('Ride.history',compact('device'));
    }

    

}
