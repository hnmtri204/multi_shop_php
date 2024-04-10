@extends('layout')

@section('content')

<!-- home content -->
<section class="home">
  <div class="content">
    <h1> <span>Electronic</span><br>
      Electronic <span id="span2">50%</span>
    </h1>
    <p>Uy tín - Chất lượng - Tạo nên thương hiệu.
      <br>Electronic luôn đồng hành cùng bạn.
    </p>
    <div class="btn"><button>Shop Now</button></div>

  </div>
  <div class="img">
    <img src="../images/background.png" alt="">
  </div>
</section>
<!-- home content -->


<!--  product cards hot-->
<div class="container" id="product-cards">
  <h1 class="text-center">PRODUCTS</h1>
  <p>Sản phẩm nổi bật:</p>
  <div class="row" style="margin-top: 20px;" id="product-hot">
    <!--  products cards hot -->
    @php
    $limit_hot = 4;
    $count_hot = 0;
    @endphp
    @foreach($products as $product)
    @if($count_hot < $limit_hot) <div class="col-md-3 py-3">
      <a class="card" style="text-decoration: none" href=" {{ route('home-show-page', $product->id) }} ">
        <!-- <img src="../images/a1.png" alt=""> -->
        <img src="{{ url($product -> img)}}" alt="">
        <div class="card-body">
          <h3 class="text-center">{{$product -> name}}</h3>
          <!-- <h3 class="text-center">ABC</h3> -->
          <!-- <p class="text-center">Sản phẩm bán chạy nhất.</p> -->
          <p class="text-center">{{$product -> description}}</p>
          <div class="star text-center">
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
          </div>
          <!-- <h2>Price:100$<span> -->
          <h2>{{$product -> price}}<span>
              <li class="fa-solid fa-cart-shopping"></li>
            </span></h2>
        </div>
      </a>
  </div>
  @php $count_hot++; @endphp
  @else
    @break
  @endif
  @endforeach
</div>
</div>
<!-- end hot product cards -->


<!-- other cards -->
<div class="container" id="other-cards">
  <div class="row">
    <div class="col-md-6 py-3 py-md-0">
      <div class="card">
        <img src="../images/c1.png" alt="">
        <div class="card-img-overlay">
          <h3>Best Laptop</h3>
          <h5>Latest Collection</h5>
          <p>Up To 50% Off</p>
          <button id="shopnow">Shop Now</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 py-3 py-md-0">
      <div class="card">
        <img src="../images/c2.png" alt="">
        <div class="card-img-overlay">
          <h3>Best Headphone</h3>
          <h5>Latest Collection</h5>
          <p>Up To 50% Off</p>
          <button id="shopnow">Shop Now</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- other cards -->


<!-- banner -->
<section class="banner">
  <div class="content">
    <h1> <span>Electronic Gadget</span>
      <br>
      Up To <span id="span2">50%</span> Off
    </h1>
    <p>Uy tín-Chất lượng-Tạo nên thương hiệu.
      <br>Electronic luôn đồng hành cùng bạn.
    </p>
    <div class="btn"><button>Shop Now</button></div>

  </div>
  <div class="img">
    <img src="../images/image1.png" alt="">
  </div>
</section>
<!-- banner -->


<!-- product cards new -->
<div class="container" id="product-cards">
  <p>Sản phẩm mới cập nhật:</p>
  <div class="row" style="margin-top: 20px;" id="product-new">

    @php
    $limit_new = 4;
    $count_new = 0;
    @endphp
    @foreach($products as $product)
    @if($count_new < $limit_new)
    <div class="col-md-3 py-3">
      <a class="card" style="text-decoration: none" href="  ">
        <!-- <img src="../images/a1.png" alt=""> -->
        <img src="{{ url($product -> img)}}" alt="">
        <div class="card-body">
          <h3 class="text-center">{{$product -> name}}</h3>
          <!-- <h3 class="text-center">ABC</h3> -->
          <!-- <p class="text-center">Sản phẩm bán chạy nhất.</p> -->
          <p class="text-center">{{$product -> description}}</p>
          <div class="star text-center">
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
          </div>
          <!-- <h2>Price:100$<span> -->
          <h2>{{$product -> price}}<span>
              <li class="fa-solid fa-cart-shopping"></li>
            </span></h2>
        </div>
      </a>
    </div>
    @php
    $count_new++;
    @endphp
    @else 
      @break
    @endif
    @endforeach
  </div>
</div>
<!-- end products cart new  -->

<!-- other cards -->
<div class="container" id="other">
  <div class="row">
    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="../images/c3.png" alt="">
        <div class="card-img-overlay">
          <h3>Home Gadget</h3>
          <p>Latest collection Up To 50% Off</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="../images/c4.png" alt="">
        <div class="card-img-overlay">
          <h3>Gaming Gadget</h3>
          <p>Latest collection Up To 50% Off</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="../images/c5.png" alt="">
        <div class="card-img-overlay">
          <h3>Electronic Gadget</h3>
          <p>Latest collection Up To 50% Off</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- other cards -->

<!-- list product cards  -->
<div class="container" id="product-cards">
  <p>Danh sách sản phẩm:</p>
  <div class="row" style="margin-top: 30px;" id="product-list">

    @foreach($products as $product)
    <div class="col-md-3 py-3">
      <a class="card" style="text-decoration: none" href="  ">
        <!-- <img src="../images/a1.png" alt=""> -->
        <img src="{{ url($product -> img)}}" alt="">
        <div class="card-body">
          <h3 class="text-center">{{$product -> name}}</h3>
          <!-- <h3 class="text-center">ABC</h3> -->
          <!-- <p class="text-center">Sản phẩm bán chạy nhất.</p> -->
          <p class="text-center">{{$product -> description}}</p>
          <div class="star text-center">
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
          </div>
          <!-- <h2>Price:100$<span> -->
          <h2>{{$product -> price}}<span>
              <li class="fa-solid fa-cart-shopping"></li>
            </span></h2>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
<!-- end list products cart   -->


<!-- offer -->
<div class="container" id="offer">
  <div class="row">
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-cart-shopping"></i>
      <h3>Free Shipping</h3>
      <p>On order over $1000</p>
    </div>
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-rotate-left"></i>
      <h3>Free Returns</h3>
      <p>Within 30 days</p>
    </div>
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-truck"></i>
      <h3>Fast Delivery</h3>
      <p>World Wide</p>
    </div>
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-thumbs-up"></i>
      <h3>Big choice</h3>
      <p>Of products</p>
    </div>
  </div>
</div>
<!-- offer -->

<!-- newslater -->
<div class="container" id="newslater">
  <h3 class="text-center">Subscribe To The Electronic Shop For Latest upload.</h3>
  <div class="input text-center">
    <input type="text" placeholder="Enter Your Email..">
    <button id="subscribe">SUBSCRIBE</button>
  </div>
</div>
<!-- newslater -->

@endsection