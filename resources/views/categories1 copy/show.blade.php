@extends('layout')

@section('content')
  <!-- list product cards  -->
  <div class="container" id="product-cards">
    <div class="row" style="margin-top: 30px;" id="product-list">
      <!-- list produts cards -->
      @foreach($productByCategory as $product)          
      <div class="col-md-3 py-3">
        <a class="card" style="text-decoration: none" href="#">
         <img src= "{{ url($product->img) }}" alt="">
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
  <!-- end list products cart   -->

@endsection