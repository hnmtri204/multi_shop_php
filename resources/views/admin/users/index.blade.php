@extends('admin.layout')

@section('content')
<div class="row">
    <!-- basic table -->
    @if(Session::has('message'))
    <h3>{{Session::get('message')}}</h3>
    @endif
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Users Table</h5>
            <a href="{{ route('admin.users.create')}}" class="d-flex justify-content-end ">
                <button type="button" class="btn btn-primary">Create New</button>
            </a>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td class="text-primary">{{ $user->email }}</td>
                            <td class="">{{ $user->password }}</td>
                            <td>{{ $user->role }}</td>
                            <td><a href="{{ route('admin.users.edit', $user->id) }}"><i class="fa-solid fa-pen"></i></td>
                            <td>
                                <form action=" {{ route('admin.users.destroy', $user->id ) }} " method="post">
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