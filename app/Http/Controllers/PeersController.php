<?php

namespace App\Http\Controllers;
use App\User;
use App\User_info;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Response;
use Auth;
use App\Http\Requests\StorePeerUsers;
use App\Http\Resources\Peer as PeerResource;
use Illuminate\Http\Request;

class PeersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::role('peers')->where('parent_id',Auth::id())->get();
        $users = User::role('peers')->permission('View Map')->where('parent_id',Auth::id())->get();

        return view('CRUD.users.peer_index',compact('users','user'));
    }

    public function PeerNo(){
        $users = User::role('peers')->where('parent_id',Auth::id())->get();
        //dd($users);
        $user = User::role('peers')->permission('View Map')->where('parent_id',Auth::id())->get();
        $keys = $user->keys()->toArray();
        //dd($users);

        $users->forget($keys);
        //dd($users);
        return view('CRUD.users.peerNo',compact('users','user'));
    }

    public function removePerm(Request $request){
        $user = User::find($request->peer_id);
        $user->revokePermissionTo('View Map');
        return Response::json($user);
    }

    public function addPerm(Request $request){
        $user = User::find($request->peer_id);
        $user->givePermissionTo('View Map');
        return Response::json($user);
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
    public function store(StorePeerUsers $request)
    {
        $validated = $request->validated();
        
        if($validated){

           $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'parent_id' => Auth::id(),
            'is_verified' => 1
            ]);

           $user->assignRole('peers');
           $user->givePermissionTo('View Map');
        
            return Response::json($user);
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
        $peers = User::role('peers')->where('id',$id)->firstOrFail();
        return new PeerResource($peers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $info = User_info::find($id);

        $info->first_name = $request->first_name;
        $info->last_name = $request->last_name;
        $info->gender = $request->gender;
        $info->contact_number = $request->contact;
        $info->birthday = $request->birthday;
        $info->home_address = $request->address;
        $info->user_id = $id;
       
        $info->save();

        return Response::json($info);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peer = User::find($id);
        $peer->delete();
        return Response::json($peer);
    }
}
