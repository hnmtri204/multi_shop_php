@extends('layout')

@section('content')
<div class="container" id="login">
    <div class="row">
        <!-- <form action="" method="post"> -->
           
            <div class="col-md-5 py-3 py-md-0" id="side1">
                <h3 class="text-center">Login</h3>
            </div>
            <div class="col-md-7 py-3 py-md-0" id="side2">
                <h3 class="text-center">Create Account</h3>
                <div class="input2 text-center">
                    <input name="email" type="email" id="email" placeholder="Email">
                    <input name="password" type="password" id="password" placeholder="Password">
                    <input name="role" type="text" id="role" placeholder="Role">

                </div>
                <div class="container d-flex justify-content-center mt-3" id="test">
                    <button type="submit" class="btn " style="height: 50px; width: 110px;" id="btn_register">
                        Login
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
@endsection