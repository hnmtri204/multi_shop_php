@extends('layout')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="{{ url('img/carousel-1.jpg') }}" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men Fashion</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="{{ url('img/carousel-2.jpg') }}" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="{{ url('img/carousel-3.jpg') }}" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids Fashion</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src=" {{ url('img/offer-1.jpg') }}" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src=" {{ url('img/offer-2.jpg') }}" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->

<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3">
                <span class="bg-secondary pr-3">Filter by price</span>
            </h5>
            <div class="bg-light p-4 mb-30">
                <form action="{{ route('categories.show', $category->id) }}" method="GET">
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-all" name="price" value="all" onclick="this.form.submit()" @if(request()->price == 'all') checked @endif>
                        <label class="custom-control-label" for="price-all">All Price</label>
                        <span class="badge border font-weight-normal">@if(request()->price == 'all') {{ $products->total() }} @else ... @endif</span>
                    </div>
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-1" name="price" value="1" onclick="this.form.submit()" @if(request()->price == '1') checked @endif>
                        <label class="custom-control-label" for="price-1">$0 - $100</label>
                        <span class="badge border font-weight-normal">@if(request()->price == '1') {{ $products->total() }} @else ... @endif</span>
                    </div>
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-2" name="price" value="2" onclick="this.form.submit()" @if(request()->price == '2') checked @endif>
                        <label class="custom-control-label" for="price-2">$100 - $200</label>
                        <span class="badge border font-weight-normal">@if(request()->price == '2') {{ $products->total() }} @else ... @endif</span>
                    </div>
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-3" name="price" value="3" onclick="this.form.submit()" @if(request()->price == '3') checked @endif>
                        <label class="custom-control-label" for="price-3">$200 - $300</label>
                        <span class="badge border font-weight-normal">@if(request()->price == '3') {{ $products->total() }} @else ... @endif</span>
                    </div>
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="price-4" name="price" value="4" onclick="this.form.submit()" @if(request()->price == '4') checked @endif>
                        <label class="custom-control-label" for="price-4">$300 - $400</label>
                        <span class="badge border font-weight-normal">@if(request()->price == '4') {{ $products->total() }} @else ... @endif</span>
                    </div>
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between">
                        <input type="radio" class="custom-control-input" id="price-5" name="price" value="5" onclick="this.form.submit()" @if(request()->price == '5') checked @endif>
                        <label class="custom-control-label" for="price-5">$400 - $500</label>
                        <span class="badge border font-weight-normal">@if(request()->price == '5') {{ $products->total() }} @else ... @endif</span>
                    </div>
            </div>
            <!-- Price End -->

            <!-- Name Start -->
            <h5 class="section-title position-relative text-uppercase mb-3">
                <span class="bg-secondary pr-3">Filter by name</span>
            </h5>
            <div class="bg-light p-4 mb-30">
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" class="custom-control-input" id="name-atoz" name="name" value="AtoZ" onclick="this.form.submit()" @if(request()->name == 'AtoZ') checked @endif>
                        <label class="custom-control-label" for="name-atoz">A->Z</label>
                        <span class="badge border font-weight-normal">@if(request()->name == 'AtoZ') {{ $products->total() }} @else ... @endif</span>
                    </div>
                    <div class="custom-control custom-radio d-flex align-items-center justify-content-between">
                        <input type="radio" class="custom-control-input" id="name-ztoa" name="name" value="ZtoA" onclick="this.form.submit()" @if(request()->name == 'ZtoA') checked @endif>
                        <label class="custom-control-label" for="name-ztoa">Z->A</label>
                        <span class="badge border font-weight-normal">@if(request()->name == 'ZtoA') {{ $products->total() }} @else ... @endif</span>
                    </div>
                </form>
            </div>
            <!-- Name End -->
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
                                <!-- <span class="bg-secondary pr-3">{{ $category->name }}</span> -->
                            </h2>
                        </div>
                        <!-- <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('storage/'.$product->img) }}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="{{ route('home-show-page', $product->id) }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{ route('home-show-page', $product->id) }}">{{ $product->name }}</a>
                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 200px; margin: 0 auto;">{{$product -> description}}</p>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${{ $product->price }}</h5>
                                <!-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> -->
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12 d-flex justify-content-center">
                    <nav>
                        @if(isset($products))
                        {{ $products->links('pagination::bootstrap-4') }}
                        @endif
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>



<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-1.jpg') }}" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-2.jpg') }}" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-3.jpg') }}" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-4.jpg') }}" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-5.jpg') }}" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-6.jpg') }}" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-7.jpg') }}" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="{{ url('img/vendor-8.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->
@endsection