@extends('layout')

@section('content')
<!-- home content -->
<section class="home">
    <div class="content">
      <h1> <span>Electronic Products</span>
        <br>
        Up To <span id="span2">50%</span> Off
      </h1>
      <p>Uy tín - Chất lượng - Tạo nên thương hiệu.
        <br>Electronic luôn đồng hành cùng bạn.
      </p>
      <div class="btn"><button>Shop Now</button></div>

    </div>
    <div class="img">
      <img src="./public/images/background.png" alt="">
    </div>
  </section>
  <!-- home content -->

  <div class="container" id="product-cards">
    <h1 class="text-center">PRODUCTS</h1>
  </div>


  <!-- list product cards  -->
  <div class="container" id="product-cards">
    <p>Danh sách sản phẩm:</p>
    <div class="row" style="margin-top: 30px;" id="product-list">
      <!-- list produts cards -->
      @foreach($products as $product)          
      <div class="col-md-3 py-3">
        <a class="card" style="text-decoration: none" href="detail.html">
         <img src= "{{ $product->img }}" alt="">
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