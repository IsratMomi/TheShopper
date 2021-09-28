
   <!DOCTYPE html>
   <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link href="{{ asset('/AdminDashboard/img/The Shopper-logos.jpeg')}}" rel="icon">
     <link rel="stylesheet" href="/assets/notifier/alertify.min.css"/>
     <title>Dashboard</title>

     <link href="{{ asset('/AdminDashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
     <link href="{{ asset('/AdminDashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
     <link href="{{ asset('/AdminDashboard/css/ruang-admin.min.css')}}" rel="stylesheet">

     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>

   <body id="page-top">
     <div id="wrapper">
       <!-- Sidebar -->
       @yield('Section')
       <!-- Sidebar -->
       <div id="content-wrapper" class="d-flex flex-column">
         <div id="content">
           <!-- TopBar -->
           <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
             <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
               <i class="fa fa-bars"></i>
             </button>
             <ul class="navbar-nav ml-auto">
               <li class="nav-item dropdown no-arrow">

                 <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                   aria-labelledby="searchDropdown">
                   <form class="navbar-search">
                     <div class="input-group">
                       <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                         aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                       <div class="input-group-append">
                         <button class="btn btn-primary" type="button">
                           <i class="fas fa-search fa-sm"></i>
                         </button>
                       </div>
                     </div>
                   </form>
                 </div>
               </li>
               <li class="nav-item dropdown no-arrow mx-1">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}">Cart
                        <span class="basket-item-count">
                         <i class="fa fa-cart-plus" aria-hidden="true"> 0 </i> </a>
                        </span>
                     </li>
                 <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                   aria-labelledby="alertsDropdown">
                   <h6 class="dropdown-header">
                     Alerts Center
                   </h6>
                   <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                       <div class="icon-circle bg-primary">
                         <i class="fas fa-file-alt text-white"></i>
                       </div>
                     </div>
                     <div>
                       <div class="small text-gray-500">December 12, 2019</div>
                       <span class="font-weight-bold">A new monthly report is ready to download!</span>
                     </div>
                   </a>
                   <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                       <div class="icon-circle bg-success">
                         <i class="fas fa-donate text-white"></i>
                       </div>
                     </div>
                     <div>
                       <div class="small text-gray-500">December 7, 2019</div>
                       $290.29 has been deposited into your account!
                     </div>
                   </a>
                   <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="mr-3">
                       <div class="icon-circle bg-warning">
                         <i class="fas fa-exclamation-triangle text-white"></i>
                       </div>
                     </div>
                     <div>
                       <div class="small text-gray-500">December 2, 2019</div>
                       Spending Alert: We've noticed unusually high spending for your account.
                     </div>
                   </a>
                   <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                 </div>
               </li>
               <li class="nav-item dropdown no-arrow mx-1">
                 <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-envelope fa-fw"></i>
                   <span class="badge badge-warning badge-counter">2</span>
                 </a>
                 <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                   aria-labelledby="messagesDropdown">
                   <h6 class="dropdown-header">
                     Message Center
                   </h6>
                   <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="dropdown-list-image mr-3">
                       <img class="rounded-circle" src="Dashboard/img/man.png" style="max-width: 60px" alt="">
                       <div class="status-indicator bg-success"></div>
                     </div>
                     <div class="font-weight-bold">
                       <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                         having.</div>
                       <div class="small text-gray-500">Udin Cilok · 58m</div>
                     </div>
                   </a>
                   <a class="dropdown-item d-flex align-items-center" href="#">
                     <div class="dropdown-list-image mr-3">
                       <img class="rounded-circle" src="/AdminDashboard/img/girl.png" style="max-width: 60px" alt="">
                       <div class="status-indicator bg-default"></div>
                     </div>
                     <div>
                       <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
                         say this to all dogs, even if they aren't good...</div>
                       <div class="small text-gray-500">Jaenab · 2w</div>
                     </div>
                   </a>
                   <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                 </div>
               </li>
               <li class="nav-item dropdown no-arrow mx-1">
                 <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-tasks fa-fw"></i>
                   <span class="badge badge-success badge-counter">3</span>
                 </a>
                 <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                   aria-labelledby="messagesDropdown">
                   <h6 class="dropdown-header">
                     Task
                   </h6>




                 </div>
               </li>
               <div class="topbar-divider d-none d-sm-block"></div>

               <li class="nav-item dropdown no-arrow">

                 <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">

                   <img class="img-profile rounded-circle" src="/AdminDashboard/img/girl.png" style="max-width: 60px"> {{ Auth::user()->name }}
                 </a>

                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                   <a class="dropdown-item" href="{{route('My_profile',Auth::user()->id)}}">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     Profile
                   </a>
                   <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           Logout
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>-->
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                           onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                     Logout
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
                 </div>
               </li>
             </ul>
           </nav>
         <div>
         @yield('section')
         </div>
       </body>

         <script src="{{asset('/AdminDashboard/vendor/jquery/jquery.min.js')}}"></script>
         <script src="{{asset('/AdminDashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
         <script src="{{asset('/AdminDashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
         <script src="{{asset('/AdminDashboard/js/ruang-admin.min.js')}}"></script>
         <script src="/assets/notifier/alertify.min.js"></script>
         <script src="{{asset('/AdminDashboard/js/demo/chart-area-demo.js')}}"></script>
        <script type="text/javascript" src="/Cart/custom.js" defer=""></script>
         <script>
           @if (session('status'))
           alertify.set('notifier','position','bottom-right');
           alertify.success("{{ session('status') }}");
           @endif
           </script>
   </html>

