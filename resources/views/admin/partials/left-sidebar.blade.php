  @php
  $current_route=request()->route()->getName();
  @endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin-assets/dist/img/singurality.png')}}" alt="Singularity Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin-assets/dist/img/sayed.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

           <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item {{$current_route=='users.index'?'menu-open':''}}">
            <a href="#" class="nav-link {{$current_route=='users.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{$current_route=='users.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Users</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item {{$current_route=='visits.index'?'menu-open':''}}">
            <a href="#" class="nav-link {{$current_route=='visits.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Executive History
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visits.index')}}" class="nav-link {{$current_route=='visits.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Marketing Executive Visits</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('psales.index')}}" class="nav-link {{$current_route=='psales.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Marketing Executive Sales</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item {{$current_route=='outlets.index'?'menu-open':''}}">
            <a href="#" class="nav-link {{$current_route=='outlets.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Outlet Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('outlets.index')}}" class="nav-link {{$current_route=='outlets.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Outlets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('outlets.banners.index')}}" class="nav-link {{$current_route=='outlets.banners.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Banners</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item {{$current_route=='campaigns.index'?'menu-open':''}}">
            <a href="#" class="nav-link {{$current_route=='campaigns.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Campaign Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('campaigns.index')}}" class="nav-link {{$current_route=='campaigns.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Campaigns</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item {{$current_route=='products.index'?'menu-open':''}}">
            <a href="#" class="nav-link {{$current_route=='products.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Product Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link {{$current_route=='products.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Products</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>