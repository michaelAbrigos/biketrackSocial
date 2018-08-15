@extends('Layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}" />
<meta name="gender" value="{{$users->gender}}">
  <div class="main-container">
  	<section class="bg-white space-sm pb-4">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <h1 class="h2">Account Settings</h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <!--end of section-->
    <section class="flush-with-above space-0">
        <div class="bg-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#account" role="tab" aria-controls="general" aria-selected="true">Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="billing-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="billing" aria-selected="false">Profile</a>
                            </li>
                        
                        </ul>
                    </div>
                    <!--end of col-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
    </section>
    <section class="flush-with-above height-80 d-block">
        <div class="tab-content">
            @include('CRUD.information.account_info')
            @include('CRUD.information.profile_info')
            @include('CRUD.information.security_info')
		</div>
	</section>
</div>
	  
@include('Scripts.editAjax')
@include('Scripts.passwordRev')
<script type="text/javascript">
$(document).ready(function()
{
	$('#date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>

@endsection
