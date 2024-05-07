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
        <a class="breadcrumb-item text-dark" href="{{ route('home.index') }}">Home</a>
        <a class="breadcrumb-item text-dark" href="{{ route('product-index.index') }}">Shop</a>
        <span class="breadcrumb-item active">Shopping Cart</span>
      </nav>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
  @if(empty($cart))
  <h4 class="text-center">Giỏ hàng của bạn hiện đang trống!</h4>
  @else
  <div class="row px-xl-5">
    <div class="col-lg-8 table-responsive mb-5">
      <table class="table table-light table-borderless table-hover text-center mb-0">
        <thead class="thead-dark">
          <tr>
            <th>Products</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          @php
          $total = 0;
          @endphp

          @foreach($cart as $item)
          @php
          $subtotal = $item['price'] * $item['quantity'];
          $total += $subtotal;
          @endphp
          <tr>
            <td class="align-middle"><img src="{{ $item['img'] }}" alt="" style="width: 50px;">{{ $item['name'] }}</td>
            <td class="align-middle">${{ $item['price'] }}</td>
            <td class="align-middle">
              <form action="{{ route('update-card',$item['id'])}} " method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="input-group quantity mx-auto" style="width: 100px;">
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-primary btn-minus" type="submit">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                  <input type="text" name="quantity" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item['quantity'] }}">
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-primary btn-plus" type="submit">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
              </form>
            </td>
            <td class="align-middle">$<?php echo $subtotal ?></td>
            <form action="{{ route('delete-card', $item['id']) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <td class="align-middle"><button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-times"></i></button></td>
            </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-lg-4">
      <form class="mb-30" action="">
        <div class="input-group">
          <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
          <div class="input-group-append">
            <button class="btn btn-primary">Apply Coupon</button>
          </div>
        </div>
      </form>
      <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
      <div class="bg-light p-30 mb-5">
        <div class="border-bottom pb-2">
          <div class="d-flex justify-content-between mb-3">
            <h6>Subtotal</h6>
            <h6>$0</h6>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 class="font-weight-medium">$0</h6>
          </div>
        </div>
        <div class="pt-2">
          <div class="d-flex justify-content-between mt-2">
            <h5>Total</h5>
            <h5>$<?php echo $total ?></h5>
          </div>
          <a href="{{ route('checkout-page') }}">
            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3"> Proceed To Checkout</button>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
<!-- Cart End -->

@endsection