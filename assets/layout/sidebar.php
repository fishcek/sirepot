    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
      <div class="navbar-brand">
        <img class="img-logo-full" src="../assets/img/logo.png">
      </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="m-t-20 sidebar-heading">
        Menu
      </div>

      <?php
        $levelMenu=$_SESSION['login'][3];
        switch ($levelMenu) {
          case 'Adm':
            ?>
              <li class="nav-item">
                <a class="nav-link" href="home">
                  <i class="fas fa-fw fa-home"></i>
                  <span>Beranda</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="inputData_user">
                  <i class="fas fa-fw fa-user-edit"></i>
                  <span>Input Data User</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="infoData_user">
                  <i class="fas fa-fw fa-user-tag"></i>
                  <span>Info Data User</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="infoData_pasien">
                  <i class="fas fa-fw fa-address-book"></i>
                  <span>Info Data Pasien</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="infoAsesmen_pasien">
                  <i class="fas fa-fw fa-tag"></i>
                  <span>Info Assesmen Pasien</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-file-invoice"></i>
                  <span>Laporan User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="laporanUser?query=tahunan">Tahunan</a>
                    <a class="collapse-item" href="laporanUser?query=bulanan">Bulanan</a>
                  </div>
                </div>
              </li>           
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-file-invoice"></i>
                  <span>Laporan Pernyataan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="laporanFO?query=tahunan">Tahunan</a>
                    <a class="collapse-item" href="laporanFO?query=bulanan">Bulanan</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-file-invoice"></i>
                  <span>Laporan Assesmen</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="laporanPeksos?query=tahunan">Tahunan</a>
                    <a class="collapse-item" href="laporanPeksos?query=bulanan">Bulanan</a>
                  </div>
                </div>
              </li>
            <?php
            break;
          case 'Fo':
            ?>
                <li class="nav-item">
                <a class="nav-link" href="home">
                  <i class="fas fa-fw fa-home"></i>
                  <span>Beranda</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="inputData_pasien">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Input Data Pasien</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="infoData_pasien">
                  <i class="fas fa-fw fa-address-book"></i>
                  <span>Info Data Pasien</span></a>
              </li>  
              <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFirst" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Info Data Pasien</span>
                </a>
                <div id="collapseFirst" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="infoData_pasien">Pasien</a>
                    <a class="collapse-item" href="infoData_wali">Wali</a>
                    <a class="collapse-item" href="infoData_orangtua">Orangtua</a>
                  </div>
                </div>
              </li>-->
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-file-invoice"></i>
                  <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="laporanFO?query=tahunan">Tahunan</a>
                    <a class="collapse-item" href="laporanFO?query=bulanan">Bulanan</a>
                  </div>
                </div>
              </li>
            <?php
            break;
          case 'Peksos':
            ?>
              <li class="nav-item">
                <a class="nav-link" href="home">
                  <i class="fas fa-fw fa-home"></i>
                  <span>Beranda</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="infoAsesmen_pasien">
                  <i class="fas fa-fw fa-tag"></i>
                  <span>Assesmen pasien</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-file-invoice"></i>
                  <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="laporanPeksos?query=tahunan">Tahunan</a>
                    <a class="collapse-item" href="laporanPeksos?query=bulanan">Bulanan</a>
                  </div>
                </div>
              </li>
            <?php
            break;
        }
      ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading
      <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->