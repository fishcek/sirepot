<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<div class="navbar-brand m-t-5">
  <h5><?=ucwords("<strong>Sistem Informasi</strong><br> Administrasi Rehabilitasi Klien Penyandang Disabilitas Sensorik");?></h5>
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
          $dataUser=$_SESSION['login'];
          $token=$dataUser[0];
          ?>
           <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="nav-profil">
                <img class="img-profile rounded-circle p-1" src="../assets/img/dumuser.png">
                <span class="d-none d-lg-inline text-gray-600 small"><?=$dataUser[2];?></span>
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
              <a class="dropdown-item" data-target="#logoutModal" id="btnlogout">
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
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script>
  $(document).ready(function(){    
      alertify.set('notifier','position', 'top-center');
      var duration = 1.5;
    $('#btnlogout').click(function(){
      var data={
        perform:'logout'
      }; 
        $.ajax({
          type:'POST',
          url:'php/logout.php',
          data:data,
          success: function (response) {
            if (response=='success') {
              var msg = alertify.success('', 1.5, function(){ clearInterval(interval); 
              window.location.assign('home');});
              var interval = setInterval(function(){
                  msg.setContent('Berhasil Logout');
              },150);                
            } else {
              alertify.set('notifier','delay', 1.5);
              alertify.error('Gagal Logout');
            }
          },
          dataType:'text'
        });
    });
  });
</script>