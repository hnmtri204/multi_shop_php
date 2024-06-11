@extends('admin.layout')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <!-- basic form  -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Users</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Users Form</h5>
                            <div class="card-body">
                                <form action=" {{ route('admin.users.store') }} " method="post">
                                    {{ csrf_field('') }}
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Name</label>
                                        <input name="name" id="inputText3" type="text" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input name="email" id="inputEmail" type="email" placeholder="email@example.com" class="form-control">
                                        <p>We'll never share your email with anyone else.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Password</label>
                                        <input name="password" id="inputText4" type="text" class="form-control" placeholder="Password">
                                    </div>


                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Role</label>
                                        <select name="role" class="form-control dropdown-toggle" aria-label="Default select example">
                                        <optionselected>User</option>
                                                <option value="user">User</option>
                                                <option value="staff">Staff</option>
                                                <option value="admin">Admin</option>
                                        </select>
                                    </div>

                                    <div class="form-group d-flex justify-content-end">
                                        <button type="button" class="btn btn-gray mr-4"><a href="{{ route('admin.users.index') }}">Cancel!</a></button>
                                        <button type="submit" class="btn btn-success">Create!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end basic form  -->
            </div>
        </div>
    </div>
</div>
@endsection