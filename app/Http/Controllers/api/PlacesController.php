<?php

namespace App\Http\Controllers\api;
use App\Place;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    public function getAllPlaces(){
        $places = Place::all();
        return Response::json(['place'=>$places]);
    }
}
