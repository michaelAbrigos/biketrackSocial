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

    public function destroy($id)
    {
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

    public function search(Request $request){
        
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther);
        $friend2 = $friend2->modelKeys();
        
        $requests = Auth::user()->requested;
        $requests = $requests->modelKeys();

        $requested = Auth::user()->friendsRequests;
        $requested = $requested->modelKeys();


        $users = User::with('information')->role('bike_user')->where('parent_id',0)->where('id','<>',Auth::id())->wherehas('information', function ($q) use($request){
            $q->where('first_name','LIKE','%'.$request->search.'%')->orWhere('last_name','LIKE','%'.$request->search.'%')->orWhere('username','LIKE','%'.$request->search.'%');
        })->get();

        //$users = $users->forget($friend2);
        $users = $users->pluck('information');
        //$users = $users->pluck('last_name');
        
        return Response::json(['users' => $users,'friends' => $friend2,'requests'=>$requests,'requested'=>$requested]);
    }

    public function FriendRequest(){
        $requests = Auth::user()->friendsRequests;
        return Response::json(['request'=>$requests]);
    }

}
