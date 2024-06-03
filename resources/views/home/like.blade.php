@extends('layout')

@section('content')

@if(session('success'))
<div class="alert alert-success ">{{ session('success') }}</div>
@endif

<!-- Breadcrumb Start -->
<div class="container-fluid">
  <div class="row px-xl-5">
    <div class="col-12">
      <nav class="breadcrumb bg-light mb-30">
        <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item text-dark" href="{{ route('product-index') }}">Shop</a>
        <span class="breadcrumb-item active">Your like</span>
      </nav>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->


<!-- Like Start -->
<div class="container-fluid">
  @if(empty($like))
  <h4 class="text-center">Bạn chưa thích sản phẩm nào!</h4>
  @else
  <div class="row px-xl-5">
    <div class="col-lg-12 table-responsive mb-5">
      <table class="table table-light table-borderless table-hover text-center mb-0">
        <thead class="thead-dark">
          <tr>
            <th>Products</th>
            <th>Price</th>
            <th></th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          @foreach($like as $item)
          <tr>
            <td class="align-middle"><img src="{{ asset('storage/'.$item['img']) }}" alt="" style="width: 100px;">{{ $item['name'] }}</td>
            <td class="align-middle">${{ $item['price'] }}</td>
            <td class="align-middle">
            </td>
            <form action="{{ route('delete-like', $item['id']) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <td class="align-middle"><button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-thumbs-down"></i></button></td>
            </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
<!-- Like End -->

@endsection