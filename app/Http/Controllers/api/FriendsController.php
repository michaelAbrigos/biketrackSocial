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
use App\User;


class FriendsController extends Controller
{

    
    public function friendsArray(){
        
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther);
        $friends = $friend2->pluck('information');
        return Response::json(['users'=>$friends]);

    }

    public function friendsArrayList(){
        
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther);
        $friends = $friend2->pluck('information');
        return Response::json($friends);

    }


    public function store(Request $request)
    {
        $friend = new Friend;
        $friend->user_id = Auth::id();
        $friend->friend_id = $request->id;
        $friend->save();

        if ($friend) {
            $addedFriend = User::with('information')->find(Auth::id());
            $add = User::with('information')->find($request->id)->notify(new friendRequest($addedFriend));
            return Response::json(true);
        }else{
            return Response::json($add);
        }
        
    }

    public function destroy(Request $request)
    {
        $ok = Auth::user()->friends()->detach($request->id);
        if($ok){
            $unfriend = Auth::user()->friendsFromOther()->detach($request->id);
            return Response::json([$unfriend],200);
        }else{
            return Response::json([$ok],500);
        }
        
    }

    public function declineFriend(Request $request){
        $ok = Auth::user()->friendsRequests()->detach($request->id);
        if($ok){
            return Response::json([$ok],200);
        }else{
            return Response::json([$ok],500);
        }
    }

    public function search(Request $request){
        
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther);
        $friend2 = $friend2->modelKeys();
        
        $requests = Auth::user()->requested;
        $requests = $requests->modelKeys();

        $requested = Auth::user()->friendsRequests;
        $requested = $requested->modelKeys();


        $users = User::role('bike_user')->where('parent_id',0)->where('id','<>',Auth::id())->wherehas('information', function ($q) use($request){
            $q->where('first_name','LIKE','%'.$request->search.'%')->orWhere('last_name','LIKE','%'.$request->search.'%')->orWhere('username','LIKE','%'.$request->search.'%');
        })->get();

        //$users = $users->forget($friend2);
        $users = $users->pluck('information');
        //$users = $users->pluck('last_name');
        
        return Response::json(['users' => $users,'friends'=>$friend2,'requests'=>$requests,'requested'=>$requested]);
    }

    public function FriendRequest(){
        $requests = Auth::user()->friendsRequests;
        $requests = $requests->pluck('information');
        return Response::json(['users'=>$requests]);
    }

    public function confirmFriend(Request $request){

        if($request->id){
            $friend = Friend::where('friend_id',Auth::id())->where('user_id',$request->id)->first();
            $friend->confirmed = 1;
            $friend->save();
            //$user = User::find(Auth::id());
            if($friend){
                return Response::json(['friend'=>$friend,200]);
            }else{
                return Response::json(['friend'=>$friend,500]);
            }
          
        }else{
            return Response::json(["false",500]);
        }
    }

}
