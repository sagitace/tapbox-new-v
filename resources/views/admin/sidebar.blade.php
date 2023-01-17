
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{url('/redirect')}}" style="text-decoration: none; font-weight: bold;" class="text-white mylogo">Tapbox</a>
      <a class="sidebar-brand brand-logo-mini" href="{{url('/redirect')}}"><img src="{{asset('admin/assets/images/favicon.png')}}" alt="logo" style="height: 35px; width: 35px;"></a>
    </div>
    <ul class="nav">

      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/redirect')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/view_product')}}">Add Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/show_product')}}">Show Product</a></li>

          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('view_category')}}">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Categories</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Orders</span>
            <i class="menu-arrow"></i>
          </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('order')}}">All Orders</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('delivered')}}">Delivered Orders</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('processing')}}">Processing Orders</a></li>
            </ul>
          </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
          </span>
          <span class="menu-title">Sales</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('customer')}}">
          <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
          </span>
          <span class="menu-title">Users</span>
        </a>
      </li>

    </ul>
  </nav>

