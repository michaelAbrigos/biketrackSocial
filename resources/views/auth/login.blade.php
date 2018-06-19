@extends('Layouts.master')
@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-color font-adam">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" required name="email">
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <div class="input-group">
                                    <input type="password" class="form-control" id="pass" required name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><img src="{{asset('icons/eye.svg')}} " style="height: 15px;" onclick="showPass()" id="eye"  data-toggle="tooltip" data-placement="right" title="Show/Hide Password"></span>
                                    </div>
                                </div>
                        </div>
                    
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('Scripts.passwordRev')
@endsection
