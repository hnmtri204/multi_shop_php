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
                            <h3 class="section-title">Products</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Products Form</h5>
                            <div class="card-body">
                                <form action=" {{ route('admin.products.store') }} " method="post" enctype="multipart/form-data" >
                                <!-- enctype="multipart/form-data" -->
                                    {{ csrf_field('') }}
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Img</label>
                                        <input name="image" id="inputText3" type="file" placeholder="Img" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Name</label>
                                        <input name="name" id="inputEmail" type="text" placeholder="Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Description</label>
                                        <input name="description" id="inputText4" type="text" class="form-control" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Price</label>
                                        <input name="price" id="inputText4" type="text" class="form-control" placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Quantity</label>
                                        <input name="quantity" id="inputText4" type="text" class="form-control" placeholder="Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Category_id</label>
                                        <select name="category_id" class="form-control dropdown-toggle">
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->id }}: {{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">View</label>
                                        <input name="view" id="inputText4" type="number" class="form-control" placeholder="View">
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="button" class="btn btn-gray mr-4"><a href="{{ route('admin.products.index') }}">Cancel!</a></button>
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