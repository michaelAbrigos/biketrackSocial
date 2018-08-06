<?php

namespace App\Http\Controllers;
use App\History;
use App\User;
use Response;
use Auth;
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
        $history->user_id = self::checkUserParent();
        $history->save();

        if($history){
            return Response::json('Successfully added location',200);
        }else{
            return Response::json('Failed to save location',401);
        }
        
    }

    public function pointHistory(Request $request){
        $location = History::whereHas('users',function($q){
            $q->where('id',self::checkUserParent());
        })->whereDate('created_at',$request->date)->whereTime('created_at',$request->time)->get();

        return Response::json($location);
    }

    public function rangeHistory(Request $request){
        $location = History::whereHas('users',function($q){
            $q->where('id',self::checkUserParent());
        })->whereBetween('created_at',[$request->start,$request->end])->get();

        return Response::json($location);
    }

    public function showHistoryView(){
        return view('Ride.history');
    }
}
