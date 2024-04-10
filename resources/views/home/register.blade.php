@extends('layout')

@section('content')

@if(Session::has('message'))
<h3>{{Session::get('message')}}</h3>
@endif

<!-- content  -->
<div class="container" id="login">
    <div class="row">
        <form action="{{ route('register-store') }}" method="post">
            {{csrf_field()}}
            <div class="col-md-5 py-3 py-md-0" id="side1">
                <h3 class="text-center">Register</h3>
            </div>
            <div class="col-md-7 py-3 py-md-0" id="side2">
                <h3 class="text-center">Create Account</h3>
                <div class="input2 text-center">
                    <input name="name" type="text" id="name" placeholder="Name">
                    <input name="email" type="email" id="email" placeholder="Email">
                    <input name="password" type="password" id="password" placeholder="Password">
                    <input name="role" type="text" id="role" placeholder="Role">
                    <h6 class="d-flex justify-content-center mt-3">Login  <a href="http://">here!</a></h6>

                </div>
                <div class="container d-flex justify-content-center mt-3" id="test">
                    <button type="submit" class="btn " style="height: 50px; width: 110px;" id="btn_register">
                        SIGN UP
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- content  -->

<!-- newslater -->
<div class="container" id="newslater" style="margin-top: 100px;">
    <h3 class="text-center">Subscribe To The Electronic Shop For Latest upload.</h3>
    <div class="input text-center">
        <input type="text" placeholder="Enter Your Email..">
        <button id="subscribe">SUBSCRIBE</button>
    </div>
</div>
<!-- newslater -->


@endsection