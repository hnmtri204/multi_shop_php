
<!-- Top navbar -->
<div class="top-navbar">
     <p></p>
     <div class="icons" id="loginDiv">
        <a href="login.html"><img src="./images/register.png" alt="" width="18px">Login</a>
         <a href="{{ route('register') }}"><img src="./images/register.png" alt="" width="18px">Register</a>
     </div>
 </div>
 <!-- end Top navbar -->


<!-- navbar -->
<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html" id="logo"><span id="span1">E</span>Lectronic
            <span>Shop</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="./public/images/menu.png" alt="" width="30px"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product-index.index') }}">Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(67 0 86);">
                        @foreach($categorList as $category)
                        <li><a class="dropdown-item" href="{{ route('home-category-page', $category->id) }}">{{ $category->name }}</a></li>
                        <!-- <li><a class="dropdown-item" href="category.html">Smart Phone</a></li>
                        <li><a class="dropdown-item" href="category.html">Houseware</a></li>
                        <li><a class="dropdown-item" href="category.html">Smart Watch</a></li>
                        <li><a class="dropdown-item" href="category.html">Headphone</a></li>
                        <li><a class="dropdown-item" href="category.html">Laptop</a></li>
                        <li><a class="dropdown-item" href="category.html">PC Moniter</a></li> -->
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.html">Contact</a>
                </li>
            </ul>
            <form class="d-flex" id="search" action="{{ route('search-home') }}" method="GET">
                <input name="search" class="form-control me-2" type="search" placeholder="Search ....." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>

                <div class="cart">
                    <a href="{{ route('page-card') }}"><button type="button" class="btn  position-relative text-wrap">
                            <i data-lucide="shopping-cart"></i>
                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" style="width: 50%; height: 100%">
                                    <span class="visually-hidden">New alerts</span>
                                    {{ count((array) session('cart')) }}
                                </span>
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</nav>
<!-- navbar -->