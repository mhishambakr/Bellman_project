<form method='post' action='{{url("/login")}}' enctype="multipart/form-data" class='form-group'>
    @csrf
    <div class="form-group row">
        <label for="email" class='col-form-label'>Email</label>
        <input type='email' name='email' class='form-control' id='email' value='{{old("email")}}'><br>
    </div>
    <div class="form-group row">
        <label for="password" class='col-form-label'>Password</label>
        <input type='text' name='password' class='form-control' id='password' value='{{old("password")}}'><br>
    </div>
    <input type='submit' value='Login' class='btn btn-info btn-xs btn-block'><br>
</form>