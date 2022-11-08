<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../image/static/logo_pemilwa.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pemilwa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../image/static/chat.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> aaa </a>
          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="?menu=dashboard" class="nav-link <?php if($menu=="dashboard"){ echo "active"; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="/admin/kandidat" class="nav-link <?php if($menu=="kandidat"){ echo "active"; } ?>">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Kandidat
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/user" class="nav-link <?php if($menu=="user"){ echo "active"; } ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data User
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/laporan" class="nav-link <?php if($menu=="laporan"){ echo "active"; } ?>">
              <i class="nav-icon fa fa-file"></i>
              <i class="fa-regular fa-file-chart-column"></i>
              <p>
                Laporan
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
