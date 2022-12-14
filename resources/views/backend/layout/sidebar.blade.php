@php
$prefix = Request::route()->getPrefix();
$route = Request::route()->getName();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              </li>

            </ul>
          </li>

          @if (Auth::user()->role == "admin")
          <li class="nav-item">
            <a href="{{route('water.index')}}" class="nav-link  {{$route == 'water.index'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Water Bill
                
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{route('notice.index')}}" class="nav-link  {{$route == 'notice.index'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Notice
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('speech.index')}}" class="nav-link  {{$route == 'speech.index'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Speech
                
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{route('user_list')}}" class="nav-link  {{$route == 'user_list'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                User 
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('electricity.index')}}" class="nav-link  {{$route == 'electricity.index'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Electricity
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rate.index')}}" class="nav-link  {{$route == 'rate.index'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Per Unit Rate  - Electricity
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('bill_received.index')}}" class="nav-link {{$route == 'bill_received.index'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Received Bill
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('contact.index')}}" class="nav-link {{$route == 'contact.index'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contact
                
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="{{route('electricity_by_id')}}" class="nav-link {{$route == 'electricity_by_id'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                My Electricity Bill
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('water_by_id')}}" class="nav-link {{$route == 'water_by_id'?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                My Water Bill
                
              </p>
            </a>
          </li>


          
          @endif
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>