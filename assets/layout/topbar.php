<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<div class="navbar-brand">
  <img class="img-logo-full" src="../assets/img/logo.png">
  <img class="img-logo-min" src="../assets/img/logo1.png">
</div>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Alerts -->
  

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
      <?php
        if (!isset($_SESSION['login'])) {
          ?>         
            <div class="button-group">
              <a href="login" class="btn btn-sm btn-primary">Login</a>
            </div>
          <?php
        }else{
          ?>
           <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="nav-profil">
                <img class="img-profile rounded-circle mr-2" src="../assets/img/dumuser.png">
                <span class="d-none d-lg-inline text-gray-600 small">Username</span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <!-- <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div> -->
              <a class="dropdown-item" href="php/logout" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-800"></i>
                Logout
              </a>
            </div>
          <?php
        }
    ?>
    <!-- Dropdown - User Information -->
  </li>

</ul>

</nav>
<!-- End of Topbar -->