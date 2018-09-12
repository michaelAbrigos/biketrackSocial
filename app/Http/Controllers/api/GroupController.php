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
use App\History;
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

        foreach($request->member as $key => $membername){
            $id = User_info::whereRaw("CONCAT(`first_name`,' ',`last_name`) =?",$membername)->pluck('user_id')->first();
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

        $information = User::with('information')->whereIn('id',$keys)->get();
        $information = $information->pluck('information');

        $devInfo = User::with('information')->whereHas('devices',function($q) use($keys){
            $q->whereIn('id',$keys);
        })->get();
        $devInfo = $devInfo->pluck('information');

        //return Response::json(['no'=>$user_noDevice]);
        $user_noDevice = User::whereDoesntHave('devices')->whereIn('id',$keys)->pluck('id')->toArray();
        $dev = User::has('devices')->whereIn('id',$keys)->pluck('id')->toArray();
        $locations = Array();
        foreach ($dev as $key => $id) {
            $locations[] = Location::where('device_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','device_id'])->first()->toArray();
        }
        
        $history = Array();
        
        foreach($user_noDevice as $id){
            $history[] = History::where('user_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','user_id'])->first()->toArray();
        }

        return Response::json(['location'=>$locations,'historys'=>$history,'information'=>$information,'deviceInfo'=>$devInfo]);       

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

    public function AllMemberLocations(){
        //get ID of group using POST request->id
        $curGroup = Group::whereHas('members',function($q){
            $q->where('user_id',Auth::id());
        })->get();

        $curGroup = $curGroup->pluck('id');
        
        $keys = Array();
        //add in keys[] the id of all members of group
        $groupId = Group::with('members')->whereIn('id',$curGroup)->get();
        $groupMemberDetail = $groupId->pluck('members');
        $groupMemberDetailId = $groupMemberDetail->pluck('id');
        foreach($groupMemberDetail as $group){
            foreach($group as $id){
                $keys[] = $id->id;
            }
        }

        $keys = array_unique($keys);

        $information = User::with('information')->whereIn('id',$keys)->get();
        $information = $information->pluck('information');

        $devInfo = User::with('information')->whereHas('devices',function($q) use($keys){
             $q->whereIn('id',$keys);
         })->get();
        $devInfo = $devInfo->pluck('information');

        //return Response::json(['no'=>$user_noDevice]);
        $user_noDevice = User::whereDoesntHave('devices')->whereIn('id',$keys)->pluck('id')->toArray();
        $dev = User::has('devices')->whereIn('id',$keys)->pluck('id')->toArray();
         $locations = Array();
        foreach ($dev as $key => $id) {
            $locations[] = Location::where('device_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','device_id'])->first()->toArray();
        }
        
        $history = Array();
        
         foreach($user_noDevice as $id){
             $history[] = History::where('user_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','user_id'])->first()->toArray();
         }

        // return Response::json(['location'=>$locations,'historys'=>$history,'information'=>$information,'deviceInfo'=>$devInfo]);       
        return Response::json(['information'=>$information,'deviceInfo'=>$devInfo,'location'=>$locations,'historys'=>$history]);
    }

}
