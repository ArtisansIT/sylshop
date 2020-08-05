<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('admin/assets/img/user.png') }}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello  {{ Auth::user()->name }}</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>


              <a  href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"
              class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
              {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/"> <img alt="image" src="{{ asset('admin/assets/img/logo.png') }}" class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('login') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown active">
              <a href="{{ route('admin.category_create') }}" class="nav-link"><i data-feather="monitor"></i><span>Category</span></a>
              <a href="{{ route('admin.shop') }}" class="nav-link"><i data-feather="monitor"></i><span>Shop</span></a>
              <a href="{{ route('admin.subcategory_create') }}" class="nav-link"><i data-feather="monitor"></i><span>Sub-Category</span></a>
              <a href="{{ route('admin.product') }}" class="nav-link"><i data-feather="monitor"></i><span>Product</span></a>
              <a href="{{ route('admin.requested_product') }}" class="nav-link"><i data-feather="monitor"></i><span>Product Request From Shop</span></a>
              <a href="{{ route('admin.coupane') }}" class="nav-link"><i data-feather="monitor"></i><span>Coupane</span></a>
              <a href="{{ route('admin.coupane_with_user') }}" class="nav-link"><i data-feather="monitor"></i><span>User & Coupane</span></a>
              <a href="{{ route('admin.pickup') }}" class="nav-link"><i data-feather="monitor"></i><span>Pick Up</span></a>
              <a href="{{ route('admin.payment') }}" class="nav-link"><i data-feather="monitor"></i><span>Payment</span></a>
              <a href="{{ route('admin.order_processing') }}" class="nav-link"><i data-feather="monitor"></i><span>Order Processing</span></a>
              <a href="{{ route('admin.order_delevered') }}" class="nav-link"><i data-feather="monitor"></i><span>Order Delevered</span></a>
              {{-- <a href="{{ route('admin.all_order') }}" class="nav-link"><i data-feather="monitor"></i><span>All Order</span></a> --}}
              <a href="{{ route('admin.order_section') }}" class="nav-link"><i data-feather="monitor"></i><span>Order Section</span></a>
              <a href="{{ route('admin.citems') }}" class="nav-link"><i data-feather="monitor"></i><span>Comment Items</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Widgets</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>

      $this->orders = Order::with('details')->whereHas('details', function ($query) {
    $query->where('pending', true);
})->get();