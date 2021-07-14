<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User | SiRepot</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/alertify/alertify.min.css" />
    <link rel="stylesheet" href="../assets/vendor/alertify/themes/default.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                <h1 class="h3 text-gray-900">Data Pengguna Aplikasi</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th width="10px">No</th>
                                <th width="30px">Kode</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th width="110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr class="text-center">
                                        <th width="10px">1</th>
                                        <th width="30px">KL120720211001</th>
                                        <th>Fulan</th>
                                        <th>fulan@gful.com</th>
                                        <th>admin</th>
                                        <td>
                                            <a href="detail_user?id=US001" class="btn btn-sm btn-warning">Detail</a>
                                            <a href="php/proses_user?proses=delete&id=KL120720211001" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                            <?php
                                for ($i=2; $i <=9; $i++) { 
                                        $idUser='KL12072021100'.$i;
                                    ?>
                                    <tr class="text-center">
                                        <th width="10px"><?=$i;?></th>
                                        <th width="30px"><?=$idUser;?></th>
                                        <th>Fulan</th>
                                        <th>fulan@gful.com</th>
                                        <th>FO</th>
                                        <td>
                                            <a href="detail_user?id=US001" class="btn btn-sm btn-warning">Detail</a>
                                            <a href="php/proses_user?proses=delete&id=<?=$idUser;?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                    <tr class="text-center">
                                        <th width="10px"><?=$i;?></th>
                                        <th width="30px">KL1207202110010</th>
                                        <th>Fulanah</th>
                                        <th>fulanah@gful.com</th>
                                        <th>admin</th>
                                        <td>
                                            <a href="detail_user?id=US001" class="btn btn-sm btn-warning">Detail</a>
                                            <a href="php/proses_user?proses=delete&id=KL1207202110010" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                for ($j=11; $j <=20; $j++) { 
                                        $idUser='KL12072021100'.$j;
                                    ?>
                                    <tr class="text-center">
                                        <th width="10px"><?=$j;?></th>
                                        <th width="30px"><?=$idUser;?></th>
                                        <th>Fulanah</th>
                                        <th>fulanah@gful.com</th>
                                        <th>Peksos</th>
                                        <td>
                                            <a href="detail_user?id=US001" class="btn btn-sm btn-warning">Detail</a>
                                            <a href="php/proses_user?proses=delete&id=<?=$idUser;?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?> 
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- DataTales Example -->

            
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
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Alert -->
    <script src="../assets/vendor/alertify/alertify.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

</body>
</html>