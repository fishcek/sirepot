<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header("location: login", true, 301);
        exit();
    }
    if (isset($_GET['query'])) {
        include 'php/koneksi.php';
        $range=$_GET['query'];
        $query=mysqli_query($koneksi,"SELECT * FROM tb_user ORDER BY tanggalInput DESC");
        $data=mysqli_fetch_array($query);
        if ($range=='tahunan') {            
            $dataTahun=explode('-',$data['tanggalInput']);
            $now=date('Y');
            $now1=$dataTahun[0];
            $label='Tahun';
        }else{
            $dataTahun=explode('-',$data['tanggalInput']);
            $label='Bulan';
            if (substr($dataTahun[1],'0','1')==0) {
                $now1 = substr($dataTahun[1],'1','1');
            }else{
                $now1 = $dataTahun[1];
            }
            
            if (substr(date('m'),'0','1')==0) {
                $now = substr(date('m'),'1','1');
            }else{
                $now = date('m');
            }
            
        }
        $show='hide';
        $queryLaporan=mysqli_query($koneksi, "SELECT * FROM `tb_user`");
    }

    if (isset($_POST['tampilkanLaporan'])) {
        $tahunLaporan=$_POST['tahunLaporan'];
        $show='show';
        if ($range=='tahunan') {
            $thn=substr($tahunLaporan,2,2);
            $queryLaporan=mysqli_query($koneksi, "SELECT * FROM `tb_user` WHERE SUBSTRING(`kode`, 8,2)='$thn'");
        }else{
            if (strlen($tahunLaporan)<2) {
                $thn='0'.$tahunLaporan.date('y');
            }else{
                $thn=$tahunLaporan.date('y');
            }
            $queryLaporan=mysqli_query($koneksi, "SELECT * FROM `tb_user` WHERE SUBSTRING(`kode`, 6,4)='$thn'");
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiRepot | Laporan User</title>
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
                <h1 class="h3 text-gray-900">Laporan User</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <form method="POST">
                                <div class="form-group mb-2">
                                    <label class="m-r-10">Pilih <?=$label;?> Laporan</label>
                                    <div class="input-group mb-3">
                                        <select name="tahunLaporan" class="form-control border-radius-10 m-r-10">
                                            <?php
                                                for ($i=$now; $i<=$now1; $i++) { 
                                                    echo '<option value='.$i.'>'.$i.'</option>';
                                                }
                                            ?>               
                                        </select>
                                        <div class="input-group-append">
                                            <input type="submit" name="tampilkanLaporan" value="Tampilkan" class="btn btn-info">
                                        </div>
                                    </div>                                    
                                </div>
                                
                            </form>                            
                        </div>
                        
                    </div>
                    <button onclick="print()" class="btn btn-outline-primary <?=$show;?>"><i class="fas fa-fw fa-print m-r-5"></i>Print</button>
                </div>
                <div class="container-fluid <?=$show;?>" id="laporan">
                    <table border='1' cellpadding='10' cellspacing="0" class="m-b-100" width="100%">
                        <thead>
                        <tr>    
                            <th width="20px">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Tanggal Input</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                while ($dataUser = mysqli_fetch_array($queryLaporan)) {
                                    switch ($dataUser['level']) {
                                        case 'Adm':
                                            $level='Admin';
                                            break;
                                        case 'Peksos':
                                            $level='Pekerja Sosial';
                                            break;
                                        default:
                                            $level='Front Office';
                                            break;
                                    }
                                    $tglInput=explode("-",$dataUser['tanggalInput']);
                                    ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$dataUser['kode'];?></td>
                                        <td><?=$dataUser['nama'];?></td>
                                        <td><?=$dataUser['email'];?></td>
                                        <td><?=$level;?></td>
                                        <td><?=$tglInput[2].'-'.$tglInput[1].'-'.$tglInput[0];?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        
                        </tbody>
                    </table>
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
    <script src="extensions/print/bootstrap-table-print.js"></script>
    <!-- Alert -->
    <script src="../assets/vendor/alertify/alertify.min.js"></script>
    <script>
        function print(){
            var prtContent = document.getElementById("laporan");
            var WinPrint = window.open('', '', 'left=100,top=50,width=1500,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
</body>
</html>