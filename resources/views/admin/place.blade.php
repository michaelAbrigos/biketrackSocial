@extends('Layouts.masterAdmin')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <div class="media align-items-center">
                <div class="media-body">
                    <div class="mb-3">
                        <h1 class="h2 mb-2">Places</h1>
                        <span>List of places that bike users can see</span>
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
        
        <li class="col-6 col-md-6" style="margin-left: 280px;"">
            <a class="card text-center" href="#">
                <div class="card-body">
                    <p class="display-4">{{count($places)}}</p>
                    <h6 class="title-decorative">Number of Places</h6>
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
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($places as $place)
                    <tr class="bg-white">
                        <th>{{$place->id}}</th>
                        <td>{{$place->name}}</td>
                        <td>{{$place->latitude}}</td>
                        <td>{{$place->longitude}}</td>
                        <td class="pl-4"><img src="{{asset($place->url)}}" height="100px"></td>
                        

                    </tr>
                    <tr class="table-divider"></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection