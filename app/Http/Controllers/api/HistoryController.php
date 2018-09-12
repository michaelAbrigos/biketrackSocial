<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\History;
use App\User;
use Response;
use App\Location;
use Auth;
use JWTAuth;


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

    public function saveHistoryForMobile(Request $request){
    
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

        $location = History::where('user_id',Auth::id())->whereBetween('created_at',[$request->start,$request->end])->get();

        return Response::json(['location'=>$location],200);
    }

    public function store(Request $request)
    {
        //dd($request);
        $loc = new Location;
        $loc->latitude = $request->latitude;
        $loc->longitude = $request->longitude;
        $loc->device_id = $request->device_id;
        $loc->save();
    }

    public function historyDevice(Request $request){
        $location = Location::whereHas('device',function($q) use($request){
            $q->where('device_id',$request->device_id);
        })->whereBetween('created_at',[$request->start,$request->end])->get();

        return Response::json(['location'=>$location],200);
    }


}
