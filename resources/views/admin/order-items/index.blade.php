@extends('admin.layout')

@section('content')
<div class="row">
    <!-- basic table -->
    @if(Session::has('message'))
    <h3>{{Session::get('message')}}</h3>
    @endif
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Order Items Table</h5>
            <a href="{{ route('admin.order-items.create')}}" class="d-flex justify-content-end ">
                <button type="button" class="btn btn-primary">Create New</button>
            </a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $orderItem)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>
                            <td class="text-primary">{{ $orderItem->order->id }}</td>
                            <td>{{ $orderItem->product->name }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->price }}</td>
                            <td><a href="{{ route('admin.order-items.edit', $orderItem->id) }}"><i class="fa-solid fa-pen"></i></td>
                            <td>
                                <form action=" {{ route('admin.order-items.destroy', $orderItem->id ) }} " method="post">
                                    {{ csrf_field('') }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end basic table -->
</div>
@endsection