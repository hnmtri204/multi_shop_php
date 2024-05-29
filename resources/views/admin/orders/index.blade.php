@extends('admin.layout')

@section('content')
<div class="row">
    <!-- basic table -->
    @if(Session::has('message'))
    <h3>{{Session::get('message')}}</h3>
    @endif
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Orders Table</h5>
            <a href="{{ route('admin.orders.create')}}" class="d-flex justify-content-end ">
                <button type="button" class="btn btn-primary">Create New</button>
            </a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User_id</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Code</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Note</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->code }}</td>
                            <td class="text-primary">{{ $order->status }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->note }}</td>
                            <td><a href="{{ route('admin.orders.edit', $order->id) }}"><i class="fa-solid fa-pen"></i></td>
                            <td>
                                <form action=" {{ route('admin.orders.destroy', $order->id ) }} " method="post">
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