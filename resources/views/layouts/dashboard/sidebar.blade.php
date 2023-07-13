  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">حسام موسوی</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">

              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a class="nav-link {{ request()->is('dashboard/bands*') ? 'active' : '' }}"href="{{route('dashbord.bands')}}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>بند ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('dashbord.albums')}}" class="nav-link  {{ request()->is('dashboard/albums*') ? 'active' : '' }}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>آلبوم ها</p>
                  </a>
                </li>

              </ul>
            </li>
                     </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>