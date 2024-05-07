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
                            <h3 class="section-title">Orders</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Orders Form</h5>
                            <div class="card-body">
                                <form action=" {{ route('admin.orders.update', $order->id) }} " method="post">
                                    {{ csrf_field('') }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Code</label>
                                        <input name="code" value="{{ $order->code }}" id="inputText3" type="text" placeholder="Code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Status</label>
                                        <input name="status" value="{{ $order->status }}" id="inputEmail" type="text" placeholder="Status" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">User_id</label>
                                        <input name="user_id" value="{{ $order->user_id }}" id="inputText4" type="text" class="form-control" placeholder="User_id">
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
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