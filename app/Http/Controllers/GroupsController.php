<?php

namespace App\Http\Controllers;
use App\Group;
use App\Location;
use Auth;
use Response;
use App\User;
use App\Http\Requests\GroupsRequest;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::whereHas('members',function($q){
            $q->where('user_id',Auth::id());
        })->paginate(5);
        //dd($groups);
        return view('CRUD.groups.group_index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupsRequest $request)
    {
        //dd($request);
        $validated = $request->validated();
        
        if($validated){
            $group = new Group;
            $group->name = $request->name;
            $group->description = $request->description;
            $group->parent_id = Auth::id();
            $group->save();

            $groupID = $group->id;
            foreach ($request->members as $key => $member) {
                //$user = User::find($member);
                $groupAdded = Group::find($groupID);
                $groupAdded->members()->attach($member);
            }
            $groupAdded->members()->attach(Auth::id());
        return Response::json($group);
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
        $curGroup = Group::with('members')->where('id',$id)->first();
        foreach ($curGroup->members as $member) {
            $keys[] = $member->id;
        }
        $information = User::with('information')->whereIn('id',$keys)->get();
        //dd($id);
        return view('CRUD.groups.group_details',compact('curGroup','information','id'));
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
    public function update(GroupsRequest $request, $id)
    {
        $validated = $request->validated();

        if($validated){
            $group = Group::find($id);
            $group->name = $request->name;
            $group->description = $request->description;
            $group->save();
            return response()->json(['success'=>true],200);
        }else{
            return response()->json(['success'=>false],401);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //remove group
    }

    public function leaveGroup(Request $request)
    {
        $GroupId = $request->groupId;
        $UserId = $request->userId;

        $group = Group::find($GroupId);
        //check if user is in the group
        $exists = $group->members->contains($UserId);
        
        if ($exists){
            $group->members()->detach($UserId);

            //what happens when there is only 1 member left.
           /*
            if(count($group->members) == 1 ){

            }*/

            return response()->json([$exists, 200]);
        }else{
            return response()->json([$exists, 401]);
        }
        
        
        
    }

    public function MemberLocations($id){
        //how to get the group ID
        $curGroup = Group::with('members')->where('id',$id)->first();
        foreach ($curGroup->members as $member) {
            $keys[] = $member->id;
        }

        foreach ($keys as $key => $id) {
            $user_device = User::with('devices')->where('id',$id)->first();
            //dd($user_device);
            //devices[0] means first device of user. Not yet multiple devices per user as of now.
            $device_ids[] =  $user_device->devices[0]->id;
        }

        foreach ($device_ids as $key => $id) {
            $locations[] = Location::where('device_id',$id)->orderBy('created_at', 'desc')->get(['latitude','longitude','device_id'])->first()->toArray();
        }

        return Response::json([$locations]);

    }
}
