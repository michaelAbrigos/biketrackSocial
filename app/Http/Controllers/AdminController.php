<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function getNumberBikers(){
        $user = User::role('bike_user')->get();
        return Response::json($user);
    }

    public function getNumberPeers(){
        $peer = User::role('Peers')->get();
        return Response::json($peer);
    }

    public function getNumberWithDevice(){
        $device = User::with('devices')->get();
        return Response::json($device);
    }

    //allow admins to add a place for user to check and view
    public function addPlaces(Request $request){
        
    }
    //list of places
    public function displayPlaces(){

    }
    
    public function getUpdatedLocation(){

    }
    //gets last known location of non device users.
    public function getUpdatedHistoryUser(){

    }
}
