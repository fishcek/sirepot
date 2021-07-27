<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header("location: login", true, 301);
        exit();
    }
    if (isset($_GET['query'])) {
        include 'php/koneksi.php';
        $range=$_GET['query'];
        $query=mysqli_query($koneksi,"SELECT tanggalMasukPanti FROM tb_pasien ORDER BY tanggalMasukPanti DESC");
        $data=mysqli_fetch_array($query);
        if ($range=='tahunan') {            
            $dataTahun=explode('-',$data['tanggalMasukPanti']);
            $now=date('Y');
            $now1=$dataTahun[0];
            $label='Tahun';
        }else{
            $dataTahun=explode('-',$data['tanggalMasukPanti']);
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
        $queryLaporan=mysqli_query($koneksi, "SELECT `idPasien`, `namaPasien`, `tb_pasien`.`tempatLahir` AS tmptPsien, `tb_pasien`.`tanggalLahir` AS lhrPsien, `tanggalMasukPanti`, `namaWali`, `tb_wali`.`tempatLahir` AS tmptWali, `tb_wali`.`tanggalLahir` AS lhrWali, `nomorKTP`, `alamat`, `noTelp`, `namaAyah`, `umurAyah`, `JenisKelaminAyah`, `agamaAyah`, `pekerjaanAyah`, `alamatAyah`, `namaIbu`, `umurIbu`, `JenisKelaminIbu`, `agamaIbu`, `pekerjaanIbu`, `alamatIbu` FROM `tb_pasien` JOIN `tb_wali` ON tb_pasien.idWali=tb_wali.idWali JOIN `tb_ortu` ON tb_pasien.idOrtu=tb_ortu.idOrtu");
    }

    if (isset($_POST['tampilkanLaporan'])) {
        $tahunLaporan=$_POST['tahunLaporan'];
        $show='show';
        if ($range=='tahunan') {
            $thn=$tahunLaporan;
            $queryLaporan=mysqli_query($koneksi, "SELECT `idPasien`, `namaPasien`, `tb_pasien`.`tempatLahir` AS tmptPsien, `tb_pasien`.`tanggalLahir` AS lhrPsien, `tanggalMasukPanti`, `namaWali`, `tb_wali`.`tempatLahir` AS tmptWali, `tb_wali`.`tanggalLahir` AS lhrWali, `nomorKTP`, `alamat`, `noTelp`, `namaAyah`, `umurAyah`, `JenisKelaminAyah`, `agamaAyah`, `pekerjaanAyah`, `alamatAyah`, `namaIbu`, `umurIbu`, `JenisKelaminIbu`, `agamaIbu`, `pekerjaanIbu`, `alamatIbu` FROM `tb_pasien` JOIN `tb_wali` ON tb_pasien.idWali=tb_wali.idWali JOIN `tb_ortu` ON tb_pasien.idOrtu=tb_ortu.idOrtu WHERE SUBSTRING(`idPasien`, 7,4)='$thn'");
        }else{
            if (strlen($tahunLaporan)<2) {
                $thn='0'.$tahunLaporan.date('Y');
            }else{
                $thn=$tahunLaporan.date('Y');
            }
            $queryLaporan=mysqli_query($koneksi, "SELECT `idPasien`, `namaPasien`, `tb_pasien`.`tempatLahir` AS tmptPsien, `tb_pasien`.`tanggalLahir` AS lhrPsien, `tanggalMasukPanti`, `namaWali`, `tb_wali`.`tempatLahir` AS tmptWali, `tb_wali`.`tanggalLahir` AS lhrWali, `nomorKTP`, `alamat`, `noTelp`, `namaAyah`, `umurAyah`, `JenisKelaminAyah`, `agamaAyah`, `pekerjaanAyah`, `alamatAyah`, `namaIbu`, `umurIbu`, `JenisKelaminIbu`, `agamaIbu`, `pekerjaanIbu`, `alamatIbu` FROM `tb_pasien` JOIN `tb_wali` ON tb_pasien.idWali=tb_wali.idWali JOIN `tb_ortu` ON tb_pasien.idOrtu=tb_ortu.idOrtu WHERE SUBSTRING(`idPasien`, 5,6)='$thn'");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiRepot | Laporan Pasien</title>
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
                <h1 class="h3 text-gray-900">Laporan Pasien</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <form method="GET">
                                <input type="hidden" name="query" value="<?=$_GET['query'];?>">
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
                                            <input type="submit" value="Tampilkan" class="btn btn-info">
                                        </div>
                                    </div>                                    
                                </div>
                                
                            </form>                            
                        </div>
                        
                    </div>
                    <button onclick="print()" class="btn btn-outline-primary <?=$show;?>"><i class="fas fa-fw fa-print m-r-5"></i>Print</button>
                </div>
                <div class="container-fluid <?=$show;?>" id="laporan">
                    <?php
                        $no=1;
                        while ($dataPasien = mysqli_fetch_array($queryLaporan)) {
                            $tglInput=explode("-",$dataPasien['tanggalMasukPanti']);
                            $lhrPasien=explode("-",$dataPasien['lhrPsien']);
                            $lhrWali=explode("-",$dataPasien['lhrWali']);
                            $ttlPasien=ucwords($dataPasien['tmptPsien']).', '.$lhrPasien[2].'-'.$lhrPasien[1].'-'.$lhrPasien[0];
                            $ttlWali=ucwords($dataPasien['tmptWali']).', '.$lhrWali[2].'-'.$lhrWali[1].'-'.$lhrWali[0];
                            ?>
                            <?=$no.'. '.$dataPasien['idPasien'];?>
                            <table cellpadding='2'>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?=$dataPasien['namaPasien'];?></td>
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
                            </table>
                            <table border='1' cellpadding='10' cellspacing="0" class="m-b-100" width="100%">
                                <thead>
                                <tr>    
                                    <th width="20px">No</th>
                                    <th>Nama Wali</th>
                                    <th>TTL</th>
                                    <th>Nomor KTP</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telp</th>  
                                    <th>Nama Ayah</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>pekerjaan</th>
                                    <th>Alamat</th> 
                                    <th>Nama Ibu</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>pekerjaan</th>
                                    <th>Alamat</th>                            
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>    
                                        <th width="20px"><?=$no++;?></th>
                                        <th><?=ucwords($dataPasien['namaWali']);?></th>
                                        <th><?=$ttlWali;?></th>
                                        <th><?=$dataPasien['nomorKTP'];?></th>
                                        <th><?=$dataPasien['alamat'];?></th> 
                                        <th><?=$dataPasien['noTelp'];?></th> 
                                        <th><?=ucwords($dataPasien['namaAyah']);?></th>
                                        <th><?=$dataPasien['JenisKelaminAyah'];?></th>
                                        <th><?=$dataPasien['agamaAyah'];?></th>
                                        <th><?=$dataPasien['pekerjaanAyah'];?></th>
                                        <th><?=$dataPasien['alamatAyah'];?></th>
                                        <th><?=ucwords($dataPasien['namaIbu']);?></th> 
                                        <th><?=$dataPasien['JenisKelaminIbu'];?></th>
                                        <th><?=$dataPasien['agamaIbu'];?></th>
                                        <th><?=$dataPasien['pekerjaanIbu'];?></th> 
                                        <th><?=$dataPasien['alamatAyah'];?></th>
                                    </tr>
                                
                                </tbody>
                            </table>
                            <?php
                        }
                    ?>
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