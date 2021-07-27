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
    <title>Detail Klien | SiRepot</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <h1 class="h3 text-gray-900">Data Pasien</h1>
                <a href="inputData_klien" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Tambah Pasien</a>
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
                                <th>Tempat Tanggal Lahir</th>
                                <th>Tanggal Masuk</th>
                                <th>Status Aktif</th>
                                <th width="110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'php/koneksi.php';
                                $no=1;
                                $ambilData = mysqli_query($koneksi,"SELECT * FROM tb_pasien");
                                while ($dataPasien = mysqli_fetch_array($ambilData) ) {
                                    $tglLahir=explode('-',$dataPasien['tanggalLahir']);
                                    $tglMasuk=explode('-',$dataPasien['tanggalMasukPanti']);
                                    $ttl=ucwords($dataPasien['tempatLahir']).', '.$tglLahir[2].'-'.$tglLahir[1].'-'.$tglLahir[0];
                                    $masuk=$tglMasuk[2].'-'.$tglMasuk[1].'-'.$tglMasuk[0];
                                    if ($dataPasien['statAktif']=='1') {
                                        $status= '<span class="badge badge-success">Aktif</span>';
                                        $btnStatus='<a href="php/proses_pasien?proses=nonaktif&id='.$dataPasien['idPasien'].'" class="btn btn-sm btn-warning m-t-5">Nonaktifkan</a>';
                                    }else{
                                        $status = '<span class="badge badge-danger">Non Aktif</span>';
                                        $btnStatus='<a href="php/proses_pasien?proses=aktifkan&id='.$dataPasien['idPasien'].'" class="btn btn-sm btn-warning m-t-5">Aktifkan</a>';
                                    }
                                ?>

                                    <tr class="text-center">
                                        <th width="10px"><?=$no++;?></th>
                                        <th width="30px"><?=$dataPasien['idPasien'];?></th>
                                        <th><?=ucwords($dataPasien['namaPasien']);?></th>
                                        <th><?=$ttl;?></th>
                                        <th><?=$masuk;?></th>
                                        <th><?=$status;?></th>
                                        <td>
                                            <a href="detail_pasien?id=<?=$dataPasien['idPasien'];?>" class="btn btn-sm btn-success m-t-5">Detail</a>
                                            <button onclick="confirm('<?=$dataPasien['idPasien']?>')" class="btn btn-sm btn-danger m-t-5">Hapus</button>
                                            <?=$btnStatus;?>
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

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
     <!-- Alert -->
     <script src="../assets/vendor/alertify/alertify.min.js"></script>
    <script>
        function confirm(id){
            alertify.confirm('Hapus Data', 'Anda Yakin Akan Menghapus Akun Ini ?', function(){ window.location.assign('php/proses_pasien?proses=delete&id='+id); }
            , function(){window.location.assign('infoData_pasien');});
        }

    </script>
</body>
</html>