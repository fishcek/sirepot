<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header("location: login", true, 301);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="../assets/css/util.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../assets/vendor/alertify/css/themes/default.min.css" />
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../assets/layout/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper">

            <!-- Main Content -->
            <div id="content">
                <?php include '../assets/layout/topbar.php'; ?>
            </div>

            <!-- Begin Page Content -->
            <div class="container-fluid mt-0">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 text-gray-900">Input Data User</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="card shadow m-b-50">
                <div class="card-body">
                    <form action="php/proses_user" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Nama</label>
                                    <input type="text" name="namaUser" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Username</label>
                                    <input type="text" name="username" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Password</label>
                                    <input type="password" name="password" id="password" class="form-control border-radius-10" onchange="validasi('password')" required>
                                    <span class="text-danger small" id="errorPass"></span>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Email</label>
                                    <input type="Email" name="email" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Level</label>
                                    <select class="form-control border-radius-10" name="level" required>
                                        <option selected hidden>---Pilih Level User---</option>
                                        <option value="Adm">Admin</option>
                                        <option value="Fo">Front Office</option>
                                        <option value="Peksos">Pekerja Sosial</option>
                                    </select>
                                </div>                                
                                
                                <div class="button-group">
                                    <input type="submit" value="Simpan" name="input_user" class="btn btn-primary">
                                    <input type="reset" value="Reset" class="btn btn-danger">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Content Row -->

            
        </div>
        <?php include '../assets/layout/footer.php'; ?>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>
    <!-- Alert -->
    <script src="../assets/vendor/alertify/alertify.min.js"></script>
    
    <script>
        function validasi(type){
            if (type=='number') {
                var value = document.getElementById('umur').value;
                if (value<1||value>=100) {
                    document.getElementById('umur').value='';
                    document.getElementById('errorUsia').innerHTML='Tidak Boleh Kurang dari 1 dan Lebih dari 100';
                }else{
                    document.getElementById('errorUsia').innerHTML='';
                }
            }else if (type=='password') {
                var pass = document.getElementById('password').value;
                var passLength = pass.length;
                if (passLength<8) {
                    document.getElementById('password').value='';
                    document.getElementById('errorPass').innerHTML='Password Minimal 8 Karakter';
                } else {
                    document.getElementById('errorPass').innerHTML='';
                }
            }
        }

        imgPasien.onchange = evt => {
            const [file] = imgPasien.files
            if (file) {
                previewImg.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>