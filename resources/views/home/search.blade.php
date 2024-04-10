@extends('layout')

@section('content')
<!-- show-search  -->
<div class="container" id="product-cards">
  <h2>Related products:</h2>
  <div class="row" style="margin-top: 30px;" id="products-search">
    <!-- show-search -->
    @foreach($productSearch as $product)
    <div class="col-md-3 py-3">
      <a class="card" style="text-decoration: none" href="detail.html">
        <img src="{{ $product->img }}" alt="">
        <div class="card-body">
          <h3 class="text-center">{{ $product->name }}</h3>
          <p class="text-center">Sản phẩm bán chạy nhất.</p>
          <div class="star text-center">
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
          </div>
          <h2>{{ $product->price }}<span>
              <li class="fa-solid fa-cart-shopping"></li>
            </span></h2>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
<!-- end show-search   -->
@endsection