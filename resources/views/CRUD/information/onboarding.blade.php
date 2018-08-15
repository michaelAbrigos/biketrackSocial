@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
	<div class="main-container">
		<div class="container" style="margin-top: 50px;">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card card-lg">
                        <div class="card-body">
                            <form class="wizard" action="{{route('account.store')}}" method="POST">
                            	@csrf
                                <ul class="nav nav-tabs text-center row justify-content-center">
                                    <li class="col-3 col-md-2"><a href="#first" class="step-circle step-circle-sm">1</a>
                                    </li>
                                    <li class="col-3 col-md-2"><a href="#second" class="step-circle step-circle-sm">2</a>
                                    </li>
                                    <li class="col-3 col-md-2"><a href="#third" class="step-circle step-circle-sm">3</a>
                                    </li>
                                    <li class="col-3 col-md-2"><a href="#fourth" class="step-circle step-circle-sm">4</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="first">
                                        <div class="row justify-content-around align-items-center">
                                            <div class="col-8 col-md-6 col-lg-4 mb-4">
                                                <img src="{{asset('/img/graphic-man-box.svg')}}" class="w-100">
                                            </div>
                                            <!--end of col-->
                                            <div class="col-12 col-md-6 col-lg-5 mb-4">
                                                <div>
                                                    <h6 class="title-decorative mb-2">Step 1.</h6>
                                                    <h4 class="mb-2">Enter your name</h4>
                                                    <p>This is especially important for your profile</p>
                                                    <div class="row">
                                                    	<div class="col">
                                                    		<div class="form-group">
		                                                        <input type="text" placeholder="First Name" name="fname" class="form-control form-control-lg" required/>
		                                                    </div>
                                                    	</div>
                                                    	<div class="col">
	                                                    	<div class="form-group">
		                                                        <input type="text" placeholder="Last Name" name="lname" class="form-control form-control-lg" required />
		                                                    </div>	
                                                    	</div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <button class="btn btn-success sw-btn-next" type="button">Next Step</button>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                        <!--end of row-->
                                    </div>
                                    <div id="second">
                                        <div class="row justify-content-around align-items-center">
                                            <div class="col-8 col-md-6 col-lg-4 mb-4">
                                                <img src="{{asset('/img/graphic-woman-writing.svg')}}" class="w-100">
                                            </div>
                                            <!--end of col-->
                                            <div class="col-12 col-md-6 col-lg-5 mb-4">
                                                <div>
                                                    <h6 class="title-decorative mb-2">Step 2.</h6>
                                                    <h4 class="mb-2">Address</h4>
                                                    <p>This is especially important for some notifications</p>
                                                    <div class="row">
                                                    	<div class="col">
                                                    		<div class="form-group">
		                                                        <input type="text" placeholder="Address" name="address" class="form-control form-control-lg" required/>
		                                                        <small>This will be used for some features on this website</small>
		                                                    </div>

                                                    	</div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="City" name="city" class="form-control form-control-lg" required/>
                                                                <small>This will be used for some features on this website</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Zip Code" name="zip_code" class="form-control form-control-lg" required/>
                                                                <small>This will be used for some features on this website</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success sw-btn-next mt-4" type="button">Next Step</button>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                        <!--end of row-->
                                    </div>
                                    <div id="third">
                                        <div class="row justify-content-around align-items-center">
                                            <div class="col-8 col-md-6 col-lg-4 mb-4">
                                                <img src="{{asset('/img/graphic-woman-writing-2.svg')}}" class="w-100">
                                            </div>
                                            <!--end of col-->
                                            <div class="col-12 col-md-6 col-lg-5 mb-4">
                                                <div>
                                                    <h6 class="title-decorative mb-2">Step 3.</h6>
                                                    <h4 class="mb-2">Other Profile Information</h4>
                                                    <p>This are some information for your profile but are optional.</p>
                                                    <div class="row">
                                                    	<div class="col">
                                                    		<div class="form-group">
		                                                        <input type="text" placeholder="Gender" name="gender" class="form-control form-control-lg" required/>
		                                                    </div>
                                                    	</div>
                                                    	<div class="col">
	                                                    	<div class="form-group">
		                                                        <input type="text" placeholder="Birthday" id="date" name="birthday" class="form-control form-control-lg" required />
		                                                    </div>	
                                                    	</div>
                                                    </div>
                                                    <div class="form-group">
		                                                <input type="text" placeholder="Contact" name="contact" class="form-control form-control-lg" required />
		                                            </div>
                            
                                
                            
                                                </div>
                                                <button class="btn btn-success sw-btn-next mt-4" type="button">Next Step</button>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                        <!--end of row-->
                                    </div>
                                    <div id="fourth">
                                        <div class="row justify-content-around align-items-center">
                                            <div class="col-8 col-md-6 col-lg-5 mb-4">
                                                <img src="{{asset('/img/graphic-man-computer.svg')}}" class="w-100">
                                            </div>
                                            <!--end of col-->
                                            <div class="col-12 col-md-6 col-lg-5 mb-4">
                                                <div>
                                                    <h6 class="title-decorative mb-2">Step 4.</h6>
                                                    <h4 class="mb-2">You're all set</h4>
                                                    <p>Well done, you've completed the process, just hit the button below to change the world.</p>
                                                </div>
                                                <button class="btn btn-success btn-lg mt-4" type="submit">Finish Setup</button>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                        <!--end of row-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function()
{
	$('#date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>
@endsection