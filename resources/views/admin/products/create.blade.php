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
                                <form action=" {{ route('admin.products.store') }} " method="post">
                                    {{ csrf_field('') }}
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Img</label>
                                        <input name="img"  id="inputText3" type="file" placeholder="Img" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Name</label>
                                        <input name="name"  id="inputEmail" type="text" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Description</label>
                                        <input name="description"   id="inputText4" type="text" class="form-control" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Price</label>
                                        <input name="price"   id="inputText4" type="text" class="form-control" placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Quantity</label>
                                        <input name="quantity"   id="inputText4" type="text" class="form-control" placeholder="Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Category_id</label>
                                        <input name="category_id"   id="inputText4" type="text" class="form-control" placeholder="Category_id">
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