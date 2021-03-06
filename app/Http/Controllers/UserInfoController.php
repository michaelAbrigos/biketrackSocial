<?php

namespace App\Http\Controllers;
use App\User_info;
use App\Device;
use Auth;
use Input;
use Response;
use Validator;
use App\Friend;
use App\User;
use App\Http\Resources\UsernameEmail as UsernameEmailResource;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User_info::with('user')->where('user_id','=',Auth::id())->first();
        $device = Device::whereHas('users', function($q){
            $q->where('id',Auth::id());
        })->first();
        //dd($device);
        if(!$users){
            return view('CRUD.information.onboarding');
        }else{
            $devices = Device::whereHas('users', function ($q){
            $q->where('id','=',Auth::id());
           
        })->get();
        if ($users->birthday == null){
            $bday = "";
        }else{
            $date = date_create($users->birthday);
            $bday = date_format($date,"M. d, Y"); 
        }
        
        return view('CRUD.information.account',compact('users','bday','device'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        /*$validator = Validator::make($data = Input::all(),User_info::$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }*/

        User_info::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'contact_number' => $request->contact,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'user_id' => Auth::user()->id
        ]);
            
        return redirect('/account'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User_info::where('user_id','=',Auth::id())->first();
        return Response::json($users);
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
        //dd($request);
        $info = User_info::find($id);

        $info->first_name = $request->first_name;
        $info->last_name = $request->last_name;
        $info->gender = $request->gender;
        $info->contact_number = $request->contact_number;
        $info->birthday = $request->birthday;
        $info->address = $request->address;
        $info->city = $request->city;
        $info->zip_code= $request->zip_code;
        $info->about_me = $request->about_me;
        $info->user_id = Auth::id();
       
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

    public function search(){
        
        $searchTerm = Input::get('searchterm');
        
        $users = User::with('information')->role('bike_user')->where('parent_id',0)->where('id','<>',Auth::id())->wherehas('information', function ($q) use($searchTerm){
            $q->where('first_name','LIKE','%'.$searchTerm.'%')->orWhere('last_name','LIKE','%'.$searchTerm.'%')->orWhere('username','LIKE','%'.$searchTerm.'%');
        })->paginate(5);
        //dd($users);
        $friend1 = Auth::user()->friends;
        $friend2 = $friend1->merge(Auth::user()->friendsFromOther)->modelKeys();
        $requests = Auth::user()->friendsRequests->modelKeys();
        $requested = Auth::user()->requested->modelKeys();
        //dd($requests);

        //dd($countFriends);
        if (count($users) > 0) {
            return view('CRUD.users.listUsersSearch',compact('users','friend2','requests','requested'));
        }else{
            return view('CRUD.users.listUsersSearch',compact('users'))->with('status','No users found. Please search again!');
        }  
    }

    public function getUsernameEmail(){
        $users = User::find(Auth::id());
        return new UsernameEmailResource($users);
    }
    
    public function updateInfo(Request $request, $id)
    {
        $validator = $request->validate([
            'username' => 'required'
        ]);
        
        if($validator->fails()){
           return Response::json(['Success'=>false],402);
        }

        $info = User::find($id);

        $info->username = $request->username;
        $info->save();

        return Response::json($info);
    }
}
