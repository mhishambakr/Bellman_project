@extends('layout.app')

@section('content')

<div class="container mt-2">
    <div class="text-center d-flex flex-column justify-content-end align-items-center border border-info rounded-lg">

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show w-50 p-3" >
            {{$error}}
            @if($error == 'The password format is invalid.')
                {!!'<br>The password contains characters from at least three of the following five categories:<br>- English uppercase characters (A – Z)<br>
                - English lowercase characters (a – z)<br>
                - Base 10 digits (0 – 9)'!!}
            @endif
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

    <form method='post' action='{{url("/shops/update",$shop->id)}}' enctype="multipart/form-data" class='form-group'>
    @csrf
        <div class="form-group row">
            <label for="name" class='col-form-label'>Name</label>
            <input type='text' name='name' class='form-control' id='name' value='{{$shop->name}}'><br>
        </div>
        <div class="form-group row">
            <label for="email" class='col-form-label'>Email</label>
            <input type='email' name='email' class='form-control' id='email' value='{{$shop->email}}'><br>
        </div>
        <div class="custom-file">
            <label for="logo" class='custom-file-label text-left'>Choose logo</label>
            <input type='file' name='logo' class='form-control' id="logo" class="custom-file-input" value='{{$shop->logo}}'><br>
        </div>
        <div class="form-group row">
            <label for="website" class='col-form-label'>Website</label>
            <input type='text' name='website' class='form-control' id='website' value='{{$shop->website}}'><br>
        </div>
        <input type='submit' value='Update' class='btn btn-info btn-xs btn-block'><br>
    </form>
    </div>
</div>

@endsection