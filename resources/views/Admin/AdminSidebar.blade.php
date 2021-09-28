<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="/AdminDashboard/img/The Shopper-logos_adobespark.jpg">
      </div>
      <div class="sidebar-brand-text mx-3">ADMIN</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{url('Dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('ProductPage')}}">
        <i class="fa fa-shopping-basket"></i>
        <span>Products</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('customer_list')}}">
        <i class="fa fa-users"></i>
        <span>Buyers</span>
      </a>

    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
        aria-controls="collapseTable">
        <i class="fa fa-user"></i>
        <span>Vendor</span>
      </a>
      <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Tables</h6>
          <a class="collapse-item" href="{{url('vendorList')}}">Vendor list</a>
          <a class="collapse-item" href="{{ route('VendorRegister')}}">Add vendor</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fa fa-list"></i>
          <span class="cus-orders">Orders</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="{{url('orders')}}">All orders</a>
            <!--<a class="collapse-item" href="#">Not Reviewed</a>-->
          </div>
        </div>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route ('requestMessage') }}">
        <i class="fa fa-envelope-open" ></i>
        <span>Restock message</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Examples
    </div>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>
