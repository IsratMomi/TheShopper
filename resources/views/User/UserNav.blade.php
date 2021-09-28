<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome </title>
  </head>
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-icon">
        <img src="/AdminDashboard/img/The Shopper-logos_adobespark.jpg">
      </div>
      <div class="sidebar-brand-text mx-3">The Shopper</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{url('/home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
  <!--  <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="fa fa-shopping-basket"></i>
        <span>My profile</span>
      </a>
    </li>-->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('my_orders')}}">
        <i class="fa fa-list"></i>
        <span>My Orders</span>
      </a>
      <!--<div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Forms</h6>
          <a class="collapse-item" href="#">Form Basics</a>
          <a class="collapse-item" href="#">Form Advanceds</a>
        </div>
      </div>-->
    </li>


    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fa fa-envelope-open" ></i>
        <span>My returns</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-file-pdf" ></i>
          <span>Vouchers</span>
        </a>
      </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Examples
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
        aria-controls="collapsePage">
        <i class="fas fa-fw fa-columns"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Example Pages</h6>
          <a class="collapse-item" href="#">Login</a>
          <a class="collapse-item" href="#">Register</a>
          <a class="collapse-item" href="#">404 Page</a>
          <a class="collapse-item" href="#">Blank Page</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>
