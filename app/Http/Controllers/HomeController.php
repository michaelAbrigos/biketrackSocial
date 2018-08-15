<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Place;
use App\Group;
use App\Device;
use App\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            $bikeUser = User::role('bike_user')->get();
            $peer = User::role('peers')->get();
            $location = Location::all();
            $place = Place::all();
            $group = Group::all();
            $device = Device::all();
            return view('admin.index',compact('bikeUser','peer','location','place','group','device'));
        }else if(Auth::user()->parent_id == null){
            return view('home');
        }else{
            return view('Bike User.real-time-tracking');
        }
        
    }
}
