   <!-- left sidebar -->
   <div class="nav-left-sidebar sidebar-dark">
       <div class="menu-list">
           <nav class="navbar navbar-expand-lg navbar-light">
               <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                   <ul class="navbar-nav flex-column">
                       <li class="nav-divider">
                           Menu
                       </li>
                       <li class="nav-item ">
                           <a class="nav-link active" href=" {{ route('dashboard-admin') }} " aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-solid fa-house"></i>Dashboard <span class="badge badge-success">6</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href=" {{ route('admin.users.index') }} " aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa-solid fa-user"></i>Users</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href=" {{ route('admin.products.index') }} " aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa-solid fa-cookie-bite"></i>Products</a>
                       </li>
                       <li class="nav-item ">
                           <a class="nav-link" href=" {{ route('admin.categories.index') }} " aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa-solid fa-list"></i>Categories</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href=" {{ route('admin.orders.index') }} " aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
                       </li>

                       <li class="nav-item">
                           <a class="nav-link" href=" {{ route('admin.order-items.index') }} " aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>OrderItems</a>
                       </li>

                       <!-- logout -->
                       <li class="nav-item" style="margin-top: 250px;">
                           <a class="nav-link" href=" {{ route('home') }} " aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-solid fa-house"></i>Home Shop</a>
                       </li>
                       <!--  -->
                       <!-- Logout -->
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <i class="fas fa-fw fa-sign-out-alt"></i>Logout
                           </a>
                       </li>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                       <!-- End Logout -->
                   </ul>
               </div>
           </nav>
       </div>
   </div>
   <!-- end left sidebar -->