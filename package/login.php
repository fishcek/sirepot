<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sirepot</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="../assets/css/util.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../assets/vendor/alertify/css/themes/default.min.css" />
</head>

<body class="bg-primary-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <h2 class="text-center m-t-40 fs-25 text-dark"><?=strtoupper("SELAMAT DATANG Sistem Informasi <br> Administrasi Rehabilitasi Klien <br> Penyandang Disabilitas Sensorik");?></h2>
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h5 text-gray-900 mb-4">Silahkan<br>Masuk Terlebih Dahulu</h1>
                  </div>
                  
                  <form class="user" action="php/login" id="form-login" name="form-login">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" id="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                      <input type="password" name="password" id="password"class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                      </div>
                    </div>
                    <hr class="sidebar-divider">
                    <input type="submit" value="Masuk" id="masuk" class="btn btn-primary btn-user btn-block">
                  </form>

                </div>
              </div>
            </div>
          </div>
          <?php include '../assets/layout/footer-login.php' ?>
        </div>

      </div>

    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>
  <!-- Alert -->
  <script src="../assets/vendor/alertify/alertify.min.js"></script>
  <script >
    $(document).ready(function(){
      alertify.set('notifier','position', 'top-center');
      var duration = 1.5;
      

      $('#masuk').click(function(){
        var username=$('#username').val();
        var password=$('#password').val();
        var formData={
          username:$('#username').val(),
          password:$('#password').val(),
          perform:1
        };

        if (username=='' && password=='') {
          alertify.set('notifier','delay', 1.5);
          alertify.error('Form Kosong');
        } else {
            $.ajax({
            type:'POST',
            url:'php/login.php',
            data:formData,
            success: function (response) {
              if (response=='success') {
                var msg = alertify.success('', 1.5, function(){ clearInterval(interval); 
                window.location.assign('home');});
                var interval = setInterval(function(){
                    msg.setContent('Berhasil Login');
                },150);                
              } else {
                alertify.set('notifier','delay', 1.5);
                alertify.error('Gagal Login');
              }
            },
            dataType:'text'
          });
        }

        // $.ajax({
        //   type:'POST',
        //   url:'php/login.php',
        //   data:formData,
        //   success: function (response) {
        //     console.log(response);
        //     switch (response) {
        //       case 'success':
        //         alertify.success('Login Berhasil');
        //         break;
            
        //       default:
        //         break;
        //     }
        //   },
        //   dataType:'text'
        // });
        return false;
      });
    });
  </script>
</body>

</html>
