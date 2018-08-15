@extends('Layouts.masterAdmin')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <div class="media align-items-center">
                <div class="media-body">
                    <div class="mb-3">
                        <h1 class="h2 mb-2">Location</h1>
                        <span>List of locations saved by devices</span>
                    </div>
                </div>
            </div>
        </div>
        <!--end of col-->
        
        <!--end of col-->
    </div>
    <!--end of row-->
</div>
<!--end of container-->


<div class="row justify-content-center mt-2">
	<div class="col-12 col-lg-10">
    <ul class="feature-list feature-list-sm row">
        
        <li class="col-6 col-md-6" style="margin-left: 280px;">
            <a class="card text-center" href="#">
                <div class="card-body">
                    <p class="display-4">{{count($locations)}}</p>
                    <h6 class="title-decorative">Number of Locations</h6>
                </div>
            </a>
        </li>
       </ul>
    </div>
</div>
<div class="container mt-2">
    <div class="row">
        <div class="col">
            <table class="table table-hover align-items-center table-borderless">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Device ID</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($locations as $location)
                    <tr class="bg-white">
                        <th>{{$location->id}}</th>
                        <td>{{$location->latitude}}</td>
                        <td>{{$location->longitude}}</td>
                        <td>{{$location->device_id}}</td>
                        <td>{{$location->created_at}}</td>

                    </tr>
                    <tr class="table-divider"></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection