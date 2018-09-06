<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;
use Response;
use App\Group;


class GroupsController extends Controller
{

    public function storeGroups(Request $request)
    {
        $group = new Group;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->parent_id = Auth::id();
        $group->save();

        $groupID = $group->id;
        
        foreach ($request->members as $key => $member) {
            $groupAdded = Group::find($groupID);
            $groupAdded->members()->attach($member);
        }

        $groupAdded->members()->attach(Auth::id());
        
        return Response::json($group);
    }

    public function getAllGroups(){
        $groups = Group::whereHas('members',function($q){
            $q->where('user_id',Auth::id());
        })->get();
    }

    public function MemberLocations(Request $request){
        //how to get the group ID
        $curGroup = Group::with('members')->where('id',$request->id)->first();
        foreach ($curGroup->members as $member) {
            $keys[] = $member->id;
        }

        foreach ($keys as $key => $id) {
            $user_device = User::with('devices')->where('id',$id)->first();
            //devices[0] means first device of user. Not yet multiple devices per user as of now.
            $device_ids[] =  $user_device->devices[0]->id;
        }

        foreach ($device_ids as $key => $id) {
            $locations[] = Location::where('device_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','device_id'])->first()->toArray();
        }

        return Response::json(['location'=>$locations]);

    }

}
