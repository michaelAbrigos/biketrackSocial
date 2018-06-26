<?php

namespace App\Http\Controllers;
use App\User;
use App\User_info;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Response;
use Auth;
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
        $users = User::with('information')->role('peers')->where('parent_id',Auth::id())->get();
        //dd($users);
        return view('CRUD.users.peer_index',compact('users'));
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
    public function store(Request $request)
    {

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'parent_id' => Auth::id()
        ]);

        $userID = $user->id;

        $user_if = User_info::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'user_id' => $userID
        ]);

        if ($user_if = true){
            $user->assignRole('peers');
            return Response::json($user->information);
        }else{
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
        $peers = User::with('information')->role('peers')->where('id',$id)->firstOrFail();
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
        //
    }
}
