<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;
use Response;
use App\Group;
use App\Location;
use App\User;
use App\User_info;


class GroupsController extends Controller
{

    public function storeGroups(Request $request)
    {
        $group = new Group;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->parent_id = Auth::id();
        $group->save();

        return Response::json($group);
    }

    public function saveMembers(Request $request){
        $g_id = Group::where('parent_id',Auth::id())->orderBy('created_at','desc')->pluck('id')->first();
        
        //$ids = array();
        foreach($request->member as $key => $membername){
            $id = User_info::whereRaw("CONCAT(`first_name`,' ',`last_name`) =?",$membername)->pluck('id')->first();
            if($id){
                $groupAdded = Group::find($g_id);
                $groupAdded->members()->attach($id);
            }
        }
        $groupAdded->members()->attach(Auth::id());
        return Response::json($groupAdded);
    }

    public function getAllGroups(){
        $groups = Group::whereHas('members',function($q){
            $q->where('user_id',Auth::id());
        })->get();
        return Response::json(['group'=>$groups]);
    }

    public function MemberLocations(Request $request){
        //get ID of group using POST request->id
        $curGroup = Group::with('members')->where('id',$request->id)->first();
        
        //add in keys[] the id of all members of group
        foreach ($curGroup->members as $member) {
            $keys[] = $member->id;
        }

        //return Response::json(['no'=>$user_noDevice]);
        $user_noDevice = User::whereDoesntHave('devices')->whereIn('id',$keys)->pluck('id')->toArray();
        $dev = User::has('devices')->whereIn('id',$keys)->pluck('id')->toArray();

        foreach ($dev as $key => $id) {
            $locations[] = Location::where('device_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','device_id'])->first()->toArray();
        }
        
        $history = Array();
        
        foreach($user_noDevice as $id){
            $history[] = History::where('user_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','user_id'])->first()->toArray();
        }

        return Response::json(['location'=>$locations,'historys'=>$history]);       

    }

    public function deleteGroup(Request $request){
        $g_id = Group::where('parent_id',Auth::id())->where('id',$request->id)->first();
       
        $curGroup = User::with('groups')->where('id',$request->id)->pluck('id')->toArray();
        
        foreach($curGroup as $key){
            $del = User::find($key);
            $del->groups()->detach($request->id);
        }

        $g_id->delete();

        if($g_id){
            return Response::json(['okay',200]);
        }else{
            return Response::json(['sad',500]);
        }
    }

    public function deleteLatestGroup(){
        $g_id = Group::where('parent_id',Auth::id())->orderBy('created_at','desc')->first();
        $g_id->delete();
        if($g_id){
            return Response::json(['okay',200]);
        }else{
            return Response::json(['sad',500]);
        }
    }

}
