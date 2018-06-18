@extends('Layouts.master')

@section('content')


<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
    @include('Layouts.sidebar') 
    <main class="bmd-layout-content">
         <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <br>
                    <div class="card bg-light mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                         </div>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                         </div>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                         </div>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
    </main>
    
@endsection
