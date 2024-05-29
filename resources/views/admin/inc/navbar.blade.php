 <!-- navbar -->
 <!-- ============================================================== -->
 <div class="dashboard-header">
     <nav class="navbar navbar-expand-lg bg-white fixed-top">
         <a class="navbar-brand" href="http://127.0.0.1:8000/admin">Multi Shop</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse " id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto navbar-right-top">
                 <li class="nav-item">
                     <div id="custom-search" class="top-search-bar">
                         <input class="form-control" type="text" placeholder="Search..">
                     </div>
                 </li>
                 <li class="nav-item dropdown notification">
                     <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                     <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                     </ul>
                 </li>
                 <li class="nav-item dropdown connection">
                     <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                     <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                         <li class="connection-list">

                             <div class="row">
                                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                     <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                     <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt=""><span>Mail chimp</span></a>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                     <a href="#" class="connection-item"><img src="assets/images/slack.png" alt=""> <span>Slack</span></a>
                                 </div>
                             </div>
                         </li>
                     </ul>
                 </li>
                 <!-- User Dropdown -->
                 <li class="nav-item dropdown nav-user">
                     <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <img src="{{ url('img/logoo.png') }}" alt="" class="user-avatar-md rounded-circle">
                         <span id="user-name">{{ Auth::user()->name }}</span> <!-- Hiển thị tên người dùng -->
                     </a>
                 </li>
             </ul>
         </div>
     </nav>
 </div>
 <!-- ============================================================== -->
 <!-- end navbar -->