<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header("location: login", true, 301);
        exit();
    }
    if ($_GET['id']) {
        include 'php/koneksi.php';
        $idPasien=$_GET['id'];
        $query="SELECT `idPasien`, tb_asesmen.idAses, `namaPasien`, `tempatLahir`, `tanggalLahir`, `tanggalMasukPanti`, `anak`, `jenisKelaminPasien`, `agamaPasien`, `pendidikanPasien`, `statusPasien`, `golPasien`, `kerjaanPasien`, `jmlSaudaraPasien`, `kelDekatPasien`, `skorDataKelahiran`, `kesimpulanDataKelahiran`, `RekomendasiDataKelahiran`, `skorSosial`, `kesimpulanSosial`, `rekomendasiSosial`, `skorSpiritual`, `kesimpulanSpiritual`, `RekomendasiSpiritual`, `skorPenglihatan`, `kesimpulanPenglihatan`, `rekomendasiPenglihatan` FROM `tb_pasien` JOIN tb_asesmen ON tb_pasien.idAses=tb_pasien.idAses WHERE tb_pasien.idPasien='$idPasien'";
        $action=mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        $data=mysqli_fetch_array($action);
        $tglInput=explode("-",$data['tanggalMasukPanti']);
        $lhrPasien=explode("-",$data['tanggalLahir']);
        $ttlPasien=ucwords($data['tempatLahir']).', '.$lhrPasien[2].'-'.$lhrPasien[1].'-'.$lhrPasien[0];
        $tglAses=substr($data['idAses'],2,2).'-'.substr($data['idAses'],4,2).'-20'.substr($data['idAses'],6,2);
    }
    function desimal($number){
        if (strlen($number)==1) {
            $skor=$number.'.00';
        }else{
            $skor=$number;
        }
        return $skor;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Asesmen | SiRepot</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <h1 class="h3 text-gray-900">Detail Asesmen</h1>
                <a href="infoAsesmen_pasien" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Kembali</a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body text-black">
                    <table cellpadding='2'>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$data['namaPasien'];?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td><?=$ttlPasien;?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk Panti</td>
                            <td>:</td>
                            <td><?=$tglInput[2].'-'.$tglInput[1].'-'.$tglInput[0];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Asesmen</td>
                            <td>:</td>
                            <td><?=$tglAses;?></td>
                        </tr>
                    </table>
                    
                    <!-- detail laporan -->
                    <table border='1' cellpadding='10' cellspacing="0" class="m-t-10" width="100%">
                        <thead>
                        <tr>    
                            <th colspan="3">Asesemen Riwayat Kelahiran</th>                         
                        </tr>
                        <tr>                                    
                             <th>Skor</th>
                             <th>Kesimpulan dan Saran</th>
                            <th>Rekomendasi</th>  
                        </tr>
                        </thead>
                        <tbody>
                            <tr>    
                                <th><?=desimal($data['skorDataKelahiran']);?></th>
                                <th><?=ucwords($data['kesimpulanDataKelahiran']);?></th>
                                <th><?=ucwords($data['RekomendasiDataKelahiran']);?></th>
                            </tr>
                                
                        </tbody>
                    </table>

                    <br>
                            <table border='1' cellpadding='10' cellspacing="0"  width="100%">
                                <thead>
                                <tr>    
                                    <th colspan="3">Asesemen Sosial</th>                         
                                </tr>
                                <tr>                                    
                                    <th>Skor</th>
                                    <th>Kesimpulan dan Saran</th>
                                    <th>Rekomendasi</th>  
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>    
                                        <th><?=desimal($data['skorSosial']);?></th>
                                        <th><?=ucwords($data['kesimpulanSosial']);?></th>
                                        <th><?=ucwords($data['rekomendasiSosial']);?></th>
                                    </tr>                                
                                </tbody>
                            </table>
                            <br>
                            <table border='1' cellpadding='10' cellspacing="0"  width="100%">
                                <thead>
                                <tr>    
                                    <th colspan="3">Asesemen Mental-Spiritual</th>                         
                                </tr>
                                <tr>                                    
                                    <th>Skor</th>
                                    <th>Kesimpulan dan Saran</th>
                                    <th>Rekomendasi</th>  
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>    
                                        <th><?=desimal($data['skorSpiritual']);?></th>
                                        <th><?=ucwords($data['kesimpulanSpiritual']);?></th>
                                        <th><?=ucwords($data['RekomendasiSpiritual']);?></th>
                                    </tr>                                
                                </tbody>
                            </table>
                            <br>
                            <table border='1' cellpadding='10' cellspacing="0" class="m-b-50"  width="100%">
                                <thead>
                                <tr>    
                                    <th colspan="3">Asesemen Penglihatan</th>                         
                                </tr>
                                <tr>                                    
                                    <th>Skor</th>
                                    <th>Kesimpulan dan Saran</th>
                                    <th>Rekomendasi</th>  
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>    
                                        <th><?=desimal($data['skorPenglihatan']);?></th>
                                        <th><?=ucwords($data['kesimpulanPenglihatan']);?></th>
                                        <th><?=ucwords($data['rekomendasiPenglihatan']);?></th>
                                    </tr>                                
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
</body>
</html>