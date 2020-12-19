@extends('layout.app')

@section('content')

<div class="container mt-2">
    <h1 class='page-header'>Shops</h1>
    <div class="row jumbotron">
        @foreach($shops as $shop)
            <div class='col-lg-4 col-sm-6 col-xs-12 text-center d-flex flex-column justify-content-end align-items-center'>
                <h2><a href="{{url('shops/show',$shop->id)}}">{{$shop->id}} - {{$shop->name}}</a></h2>
            </div>
        @endforeach
    </div>
</div>

@endsection