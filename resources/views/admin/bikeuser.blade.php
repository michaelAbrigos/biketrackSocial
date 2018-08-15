@extends('Layouts.masterAdmin')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <div class="media align-items-center">
                <div class="media-body">
                    <div class="mb-3">
                        <h1 class="h2 mb-2">Bike Users</h1>
                        <span>List of registered bike users</span>
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

        <li class="col-6 col-md-6">
            <a class="card text-center" href="#">
                <div class="card-body">
                    <p class="display-4">{{count($verified)}}</p>
                    <h6 class="title-decorative">Verified Bike User</h6>
                </div>
            </a>
        </li>

        <li class="col-6 col-md-6">
            <a class="card text-center" href="#">
                <div class="card-body">
                    <p class="display-4">{{count($unverified)}}</p>
                    <h6 class="title-decorative">Unverified Bike User</h6>
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
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($users as $user)
                    <tr class="bg-white">
                        <th scope="row">
                            <div class="media align-items-center">
                               
                                <div class="media-body">
                                    <span class="h6 mb-0">{{$user->username}}
                                        </span>
                                    <span class="text-muted">Bike User</span>
                                </div>
                            </div>
                        </th>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                    <tr class="table-divider"></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection