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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $notifs = $user->notifications;
        return Response::json(count($notifs));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getList(){
        $user = User::find(Auth::id());
        $notifs = $user->notifications ;
        return Response::json($notifs);
    }

    public function confirmFriend(Request $request){
        if($request->f_id){
            $friend = Friend::where('friend_id',Auth::id())->where('user_id',$request->f_id)->first();
        }else{

        }
        
    }
}
