<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Notification;
use App\Notifications\friendRequest;
use Auth;
use Response;
use App\Friend;


class FriendsController extends Controller
{

    
    public function friendsArray(){
        
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther);
        return Response::json($friend2);

    }


    public function store(Request $request)
    {
        $this->validate($request, ['token' => 'required']);
        $friend = new Friend;
        $friend->user_id = Auth::id();
        $friend->friend_id = $request->f_id;
        $friend->save();

        if ($friend) {
            $addedFriend = User::with('information')->find(Auth::id());
            $add = User::with('information')->find($request->f_id)->notify(new friendRequest($addedFriend));
            return Response::json($add);
        }else{
            return Response::json($add);
        }
        
    }

    public function destroy($id)
    {
        $this->validate($request, ['token' => 'required']);
        $ok = Auth::user()->friends()->detach($id);
        if($ok == 0){
            $unfriend = Auth::user()->friendsFromOther()->detach($id);
            return Response::json($unfriend);
        }else{
            return Response::json($ok);
        }
        
    }

    public function declineFriend($id){
        $this->validate($request, ['token' => 'required']);
        $ok = Auth::user()->friends()->detach($id);
        return Response::json($ok);
    }

}
