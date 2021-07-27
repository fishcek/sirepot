<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header("location: login", true, 301);
        exit();
    }
    if ($_GET['id']) {
        include 'php/koneksi.php';
        $idUser = $_GET['id'];
        $ambilUser=mysqli_query($koneksi, "Select * From tb_user Where kode='$idUser'");
        $dataUser=mysqli_fetch_array($ambilUser);
        $namaUser= $dataUser['nama'];
        $kodeUser= $dataUser['kode'];
        $userName= $dataUser['username'];
        $emailUser= $dataUser['email'];
        $level=$dataUser['level'];
        switch ($level) {
            case 'Adm':
                $levelUser='Admin';
                break;
            case 'Fo':
                $levelUser='Front Office';
                break;
            case 'Peksos':
                $levelUser='Pekerja Sosial';
                break;
        }
    }else{
        ?>
            <script>
                window.history.back();
            </script>
        <?php
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
    <link rel="stylesheet" href="../assets/vendor/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../assets/vendor/alertify/css/themes/default.min.css" />
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="../assets/css/util.css" rel="stylesheet">
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
                <h1 class="h3 text-gray-900">Data User</h1>
                <a href="infoData_user" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Kembali</a>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="card shadow m-b-50">
                <div class="card-body">
                    <form action="php/proses_user" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Kode</label>
                                    <input type="text" name="kode" value="<?=$kodeUser;?>" class="form-control border-radius-10" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Nama</label>
                                    <input type="text" name="namaUser" id="namaUser" value="<?=$namaUser;?>" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group" id="divPassword">
                                    <label class="text-dark">Password</label>
                                    <input type="password" name="password" id="password" class="form-control border-radius-10" onchange="validasi('password')">
                                    <span class="text-danger small" id="errorPass"></span>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Email</label>
                                    <input type="Email" name="email" id="email" value="<?=$emailUser;?>" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Username</label>
                                    <input type="text" name="username" id="username" value="<?=$userName;?>" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Level</label>
                                    <input type="text" id="txtLevel" value="<?=$levelUser;?>" class="form-control border-radius-10" required readonly>
                                    <select class="form-control border-radius-10" id="selectLevel" name="level" required>
                                        <option selected hidden value="0">---Pilih Level User---</option>
                                        <option value="Adm">Admin</option>
                                        <option value="Fo">Front Office (FO)</option>
                                        <option value="Peksos">Pekerja Sosial</option>
                                    </select>
                                </div>                                
                                
                                <div class="button-group">
                                    <input type="button" value="Edit" id="btnEdit" class="btn btn-warning">
                                    <input type="button" value="Batal" id="btnBatal" class="btn btn-danger">
                                    <input type="submit" value="Simpan" id="btnSimpan" name="edit_ot" class="btn btn-primary">
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
        $(document).ready(function() {
            $('#selectLevel').hide();
            $('#divPassword').hide();
            $('#btnSimpan').hide();
            $('#btnBatal').hide();
            $('#namaUser').prop('readonly', true);
            $('#password').prop('readonly', true);
            $('#email').prop('readonly', true);
            $('#username').prop('readonly', true);
            $('#selectLevel').prop('readonly', true);

            $('#btnEdit').click(function(){
                $('#selectLevel').show();
                $('#divPassword').show();
                $('#btnSimpan').show();
                $('#btnBatal').show();                
                $('#txtLevel').hide();
                $('#btnEdit').hide();                
                $('#namaUser').prop('readonly', false);
                $('#password').prop('readonly', false);
                $('#email').prop('readonly', false);
                $('#username').prop('readonly', false);
                $('#selectLevel').prop('readonly', false);
            });

            $('#btnBatal').click(function(){
                $('#selectLevel').hide();
                $('#divPassword').hide();
                $('#btnSimpan').hide();
                $('#btnBatal').hide();
                $('#btnEdit').show();
                $('#txtLevel').show();                
                $('#namaUser').prop('readonly', true);
                $('#password').prop('readonly', true);
                $('#email').prop('readonly', true);
                $('#username').prop('readonly', true);
                $('#selectLevel').prop('readonly', true);
            });
        });
 
    </script>
</body>
</html>