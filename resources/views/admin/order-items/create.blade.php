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
                            <h3 class="section-title">Basic Form Elements</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Basic Form</h5>
                            <div class="card-body">
                                <form action=" {{ route('admin.order-items.store') }} " method="post">
                                    {{ csrf_field('') }}
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Product_id</label>
                                        <input name="product_id"  id="inputText3" type="text" placeholder="ID product" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Order_id</label>
                                        <input name="order_id"  id="inputEmail" type="text" placeholder="ID order" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Quantity</label>
                                        <input name="quantity" id="inputText4" type="text" class="form-control" placeholder="Quantity">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Price</label>
                                        <input name="price"  id="inputText4" type="text" class="form-control" placeholder="Price">
                                    </div>
                                    <button type="submit" class="btn btn-success">Create!</button>
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