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
        $this->validate($request, ['token' => 'required']);
        $validated = $request->validated();
        
        if($validated){
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
        
    }

}
