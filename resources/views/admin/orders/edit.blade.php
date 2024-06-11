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
                                        <label for="inputText4" class="col-form-label">User_id</label>
                                        <select name="category_id" class="form-control dropdown-toggle">
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->id }}: {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Phone</label>
                                        <input name="phone" value="{{ $order->phone }}" id="inputText3" type="text" placeholder="Phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Address</label>
                                        <input name="address" value="{{ $order->address }}" id="inputText3" type="text" placeholder="Address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Code</label>
                                        <input name="code" value="{{ $order->code }}" id="inputText3" type="text" placeholder="Code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Status</label>
                                        <input name="status" value="{{ $order->status }}" id="inputText3" type="text" placeholder="Status" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Total</label>
                                        <input name="total" value="{{ $order->total }}" id="inputText3" type="text" placeholder="Total" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Note</label>
                                        <textarea name="note"  id="inputText3" type="text" placeholder="Note" class="form-control">{{ $order->note }}</textarea>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="button" class="btn btn-gray mr-4"><a href="{{ route('admin.orders.index') }}">Cancel!</a></button>
                                        <button type="submit" class="btn btn-success">Submit</button>
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