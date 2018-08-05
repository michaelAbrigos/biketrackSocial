@extends('Layouts.master')

@section('content')

<div class="main-container">

        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-md-9 mb-1 order-md-2">
                    <div class="card card-sm">
                        <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Real Time Location</h6>
                            </div>
                        </div>
                        <div class="list-group list-group-flush" style="height: 420px;">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-3 mb-1 order-md-1">
                    @include('Layouts.newSidebar')
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
       
</div>

@include('Scripts.locationUpdate')
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh_q1lR502bpk7MmTR0XZLTph53Ac9BUE&callback=initMap">
</script> 
@endsection
