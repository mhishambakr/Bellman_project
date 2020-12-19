@extends('layout.app')

@section('content')


<div class="container mt-2">
    <div class="jumbotron text-center d-flex flex-column justify-content-end align-items-center">

    <a href="{{url('shops')}}">ALL</a>
@if(isset($shop->id))
    
    <div class="btn-group">
        <a class="btn btn btn-outline-info" href="{{url('/shops/edit',$shop->id)}}",>Edit</a>
        <a class="btn btn btn-outline-info" href="{{url('/shops/destroy',$shop->id)}}">Delete</a>
        <!-- <a class="btn btn btn-outline-info" href="{{url('/shops/changeProfile',$shop->id)}}">Change Profile</a> -->
    </div>
    
    <img src="{{asset('/../storage/app/public/'.$shop->logo)}}" class='img-fluid'>
    <h2>{{$shop->name}}</h2>
    <p>{{$shop->email}}</p>
    <p>{{$shop->website}}</p>
    
@else
    <h1>Shop not found</h1>
@endif



    </div>
</div>

@endsection