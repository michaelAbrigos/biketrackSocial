@extends('Layouts.master')

@section('content')
<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
@include('Layouts.sidebar')
<main>
<div class="container" style="margin-top: 20px;">
	<a href="#" data-toggle="modal" id="add-group" data-target="#addGroup">Add groups</a>
</div>
</main>
@include('CRUD.groups.create')
@endsection