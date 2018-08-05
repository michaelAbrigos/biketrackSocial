@extends('Layouts.master')
@section('content')
<body class="bg-dark">
<div class="main-container pt-5">
    
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md-6 col-lg-5 section-intro">
                    <h1 class="display-3">Welcome Back!</h1>
                    <span class="lead">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                    </span>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                             @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Pick a username" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Password" name="password">
                                </div>
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="agree" name="agree-terms" id="check-agree">
                                        <label class="custom-control-label text-small" for="check-agree">Remember me next time</a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                @if (session('Success'))
                                <br>
                                    <div class="alert alert-success">
                                        {{ session('Success') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
</div>
@include('Scripts.passwordRev')
@endsection
