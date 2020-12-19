@extends('layout.app')

@section('content')

<div class="container mt-2">
    <div class="text-center d-flex flex-column justify-content-end align-items-center border border-info rounded-lg">

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show w-50 p-3" >
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

    <form method='post' action='{{url("/customers/store")}}' class='form-group'>
    @csrf
        <div class="form-group row">
            <label for="first_name" class='col-form-label'>First Name</label>
            <input type='text' name='first_name' class='form-control' id='first_name' value='{{old("first_name")}}'><br>
        </div>
        <div class="form-group row">
            <label for="last_name" class='col-form-label'>Last Name</label>
            <input type='text' name='last_name' class='form-control' id='last_name' value='{{old("last_name")}}'><br>
        </div>
        <div class="form-group row">
            <label for="email" class='col-form-label'>Email</label>
            <input type='email' name='email' class='form-control' id='email' value='{{old("email")}}'><br>
        </div>
        <div class="form-group row">
        <select name="shopId" class="custom-select">
            @foreach($shops as $shop)
                <option value="{{$shop->id}}">{{$shop->name}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group row">
            <label for="phone_number" class='col-form-label'>Phone Number</label>
            <input type='text' name='phone_number' class='form-control' id='phone_number' value='{{old("phone_number")}}'><br>
        </div>
        <input type='submit' value='Add' class='btn btn-info btn-xs btn-block'><br>
    </form>
    </div>
</div>

@endsection