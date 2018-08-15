<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Device;
use App\Place;
use App\Location;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
   public function viewBikeUsers(){
        $users = User::role('bike_user')->get();
        $verified = User::role('bike_user')->where('is_verified',1)->get();
        $unverified = User::role('bike_user')->where('is_verified',0)->get();
        return view('admin.bikeuser',compact('verified','unverified','users'));
   }

   public function viewPeers(){
        $users = User::role('peers')->get();
        $verified = User::role('peers')->where('is_verified',1)->get();
        $unverified = User::role('peers')->where('is_verified',0)->get();
        return view('admin.peer',compact('verified','unverified','users'));
   }

   public function viewLocation(){
        $locations = Location::all();
        return view('admin.location',compact('locations'));
   }

   public function viewPlaces(){
        $places = Place::all();
        return view('admin.place',compact('places'));
   }

   public function viewGroups(){
        $places = Place::all();
        return view('admin.place',compact('places'));
   }

   public function viewDevices(){
        $places = Place::all();
        return view('admin.place',compact('places'));
   }

}
