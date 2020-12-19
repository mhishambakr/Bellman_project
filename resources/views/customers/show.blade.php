@extends('layout.app')

@section('content')

<div class="container mt-2">
    <div class="jumbotron text-center d-flex flex-column justify-content-end align-items-center">

    <a href="{{url('customers')}}">ALL</a>
@if(isset($customer->id))
    
    <div class="btn-group">
        <a class="btn btn btn-outline-info" href="{{url('/customers/edit',$customer->id)}}",>Edit</a>
        <a class="btn btn btn-outline-info" href="{{url('/customers/destroy',$customer->id)}}">Delete</a>
    </div>
    <h2>{{$customer->firstName}} {{$customer->lastName}}</h2>
    <p>{{$customer->email}}</p>
    <p>{{$customer->phone}}</p>
    
@else
    <h1>Customer not found</h1>
@endif



    </div>
</div>

@endsection