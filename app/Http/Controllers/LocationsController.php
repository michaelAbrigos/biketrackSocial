<?php

namespace App\Http\Controllers;
use App\Location;
use App\User;
use  Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Response;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Bike User.real-time-tracking');
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
        //dd($request);
        $loc = new Location;
        $loc->latitude = $request->latitude;
        $loc->longitude = $request->longitude;
        $loc->device_id = $request->device_id;
        $loc->save();
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

    public function getLocation()
    {
        $currentUser = User::where('id',Auth::id())->first();
        if ($currentUser->parent_id == null) {
            $user_device = User::with('devices')->where('id','=',Auth::id())->first();
            $dev_id =  $user_device->devices[0]->id;
        }else{
            $user_device = User::with('devices')->where('id','=',$currentUser->parent_id)->first();
            $dev_id =  $user_device->devices[0]->id;
        }
       
        $location = Location::where('device_id',$dev_id)->orderBy('created_at', 'desc')->get(['latitude','longitude'])->first();
        //dd($location);
        if(!$location){
            return Response::json(False);
        }else{
            return Response::json($location);
        }
        
    }
}
