@extends('Layouts.masterAdmin')

@section('content')
    <div class="main-container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-10">
                <ul class="feature-list feature-list-sm row">

                    <li class="col-6 col-md-4">
                        <a class="card text-center nav-color text-white" href="/admin/bikeUsers">
                            <div class="card-body">
                                <p class="display-4">{{count($bikeUser)}}</p>
                                <h6 class="title-decorative">Bike Users</h6>
                            </div>
                        </a>
                    </li>

                    <li class="col-6 col-md-4">
                        <a class="card text-center nav-color text-white" href="/admin/peers">
                            <div class="card-body">
                                <p class="display-4">{{count($peer)}}</p>
                                <h6 class="title-decorative">Peers</h6>
                            </div>
                        </a>
                    </li>

                    <li class="col-6 col-md-4">
                        <a class="card text-center nav-color text-white" href="/admin/location">
                            <div class="card-body">
                                <p class="display-4">{{count($location)}}</p>
                                <h6 class="title-decorative">Saved Location</h6>
                            </div>
                        </a>
                    </li>

                    <li class="col-6 col-md-6">
                        <a class="card text-center nav-color text-white" href="/admin/places">
                            <div class="card-body">
                                <p class="display-4">{{count($place)}}</p>
                                <h6 class="title-decorative">Places</h6>
                            </div>
                        </a>
                    </li>

                    <li class="col-6 col-md-6">
                        <a class="card text-center nav-color text-white" href="/admin/devices">
                            <div class="card-body">
                                <p class="display-4">{{count($device)}}</p>
                                <h6 class="title-decorative">Device</h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection