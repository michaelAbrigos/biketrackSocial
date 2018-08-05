<?php

namespace App\Http\Controllers;
use Response;
use Auth;
use App\User;
use App\Friend;
use App\Notification;
use Illuminate\Http\Request;
use App\Notifications\friendRequest;

class FriendsController extends Controller
{

    public function index()
    {   
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther);
        //dd($friend2);
        return view('CRUD.users.listFriends',compact('friend2'));
    }

    public function friendsArray(){
        
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther);
        return Response::json($friend2);

    }

    public function store(Request $request)
    {
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
        $ok = Auth::user()->friends()->detach($id);
        if($ok == 0){
            $unfriend = Auth::user()->friendsFromOther()->detach($id);
            return Response::json($unfriend);
        }else{
            return Response::json($ok);
        }
        
    }

    public function getList(){
        $user = User::find(Auth::id());
        $notifs = $user->notifications;
        return Response::json($notifs);
    }

    public function confirmFriend(Request $request){

        if($request->f_id){
            $friend = Friend::where('friend_id',Auth::id())->where('user_id',$request->f_id)->first();
            $friend->confirmed = 1;
            $friend->save();
            $user = User::find(Auth::id());
            //$notifs = $user->unreadNotifications;

             /*foreach ($notifs as $notif) {
                if($notif["data"]["user"]["id"] == $request->f_id){
                    $notif->markAsRead();
                }
            }*/
            return Response::json($friend);
        }else{
            return Response::json($friend);
        }
        
    }

    public function FriendRequest(){
        $requests = Auth::user()->friendsRequests;
        return view('CRUD.users.listFriendRequest',compact('requests'));
    }

    public function declineFriend($id){
        $ok = Auth::user()->friends()->detach($id);
        return Response::json($ok);
    }
}
