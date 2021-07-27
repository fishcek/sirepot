<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header("location: login", true, 301);
        exit();
    }
    if ($_GET['id']) {
        include 'php/koneksi.php';
        $idPasien = $_GET['id'];
        $ambilPasien=mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE tb_pasien.idPasien='$idPasien'");
        $dataPasien=mysqli_fetch_array($ambilPasien);
        $tempatLahir = ucwords($dataPasien['tempatLahir']);
        $tgl = explode('-',$dataPasien['tanggalLahir']);
        $tanggalLahir = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
        $tanggalLahirEdit = $dataPasien['tanggalLahir'];
        $tgl1 = explode('-',$dataPasien['tanggalMasukPanti']);
        $tanggalMasukPanti = $tgl1[2].'-'.$tgl1[1].'-'.$tgl1[0];
        $tanggalMasukPantiEdit = $dataPasien['tanggalMasukPanti'];
        $nama = ucwords($dataPasien['namaPasien']);        
        $pathFoto='../assets/user/img/';
        $foto = $dataPasien['foto'];
        switch ($dataPasien['jenisKelaminPasien']) {
            case 'L':
                $selectedL='selected';
                $selectedP='';
                $jenisKelamin='Laki-Laki';
                break;            
            default:
                $selectedL='';
                $selectedP='selected';
                $jenisKelamin='Perempuan';
                break;
        }
        switch ($dataPasien['agamaPasien']) {
            case 'budha':
                $selectedIslam = '';
                $selectedKristen = '';
                $selectedKatholik = '';
                $selectedHindu = '';
                $selectedBudha = 'selected';
                break;
            case 'kristen':
                $selectedIslam = '';
                $selectedKristen = 'selected';
                $selectedKatholik = '';
                $selectedHindu = '';
                $selectedBudha = '';
                break;
            case 'katholik':
                $selectedIslam = '';
                $selectedKristen = '';
                $selectedKatholik = 'selected';
                $selectedHindu = '';
                $selectedBudha = '';
                break;
            case 'hindu':
                $selectedIslam = '';
                $selectedKristen = '';
                $selectedKatholik = '';
                $selectedHindu = 'selected';
                $selectedBudha = '';
                break;
            default:
                $selectedIslam = 'selected';
                $selectedKristen = '';
                $selectedKatholik = '';
                $selectedHindu = '';
                $selectedBudha = '';
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
    <title>Asesmen Pasien | Sirepot</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../assets/vendor/alertify/css/themes/default.min.css" />
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
            <div class="container-fluid mt-0 text-dark ">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 text-gray-800">Input Assesmen Pasien</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                </div>

                
                <!-- Content Row -->
                    <div class="card shadow m-b-50">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-gray-800">Biodata Pasien</h6>
                        </div>
                        <div class="card-body">
                        <div id="formView">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <h6 class="font-weight-bold">ID Pasien</h6>
                                            <h6 class="text-dark p-l-20"><?=$idPasien;?></h6>
                                        </div>
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Nama Pasien</h6>
                                            <h6 class="text-dark p-l-20"><?=ucwords($dataPasien['namaPasien']);?></h6>
                                        </div>
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Tempat, Tanggal Lahir</h6>
                                            <h6 class="text-dark p-l-20"><?=ucwords($tempatLahir).', '.$tanggalLahir;?></h6>
                                        </div>
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Tanggal Masuk Panti</h6>
                                            <h6 class="text-dark p-l-20"><?=$tanggalMasukPanti;?></h6>
                                        </div>
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Anak Ke-</h6>
                                            <h6 class="text-dark p-l-20"><?=$dataPasien['anak'];?></h6>
                                        </div>  
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Jenis Kelamin</h6>
                                            <h6 class="text-dark p-l-20"><?=$jenisKelamin;?></h6>
                                        </div> 
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Agama</h6>
                                            <h6 class="text-dark p-l-20"><?=ucwords($dataPasien['agamaPasien']);?></h6>
                                        </div>
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Pendidikan Terakhir</h6>
                                            <h6 class="text-dark p-l-20"><?=ucwords($dataPasien['pendidikanPasien']);?></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">                                        
                                            <h6 class="font-weight-bold">Status Perkawinan</h6>
                                            <h6 class="text-dark p-l-20"><?=ucwords($dataPasien['statusPasien']);?></h6>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="font-weight-bold">Golongan Darah</h6>
                                            <h6 class="text-dark p-l-20"><?=$dataPasien['golPasien'];?></h6>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="font-weight-bold">Pekerjaan</h6>
                                            <h6 class="text-dark p-l-20"><?=$dataPasien['kerjaanPasien'];?></h6>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="font-weight-bold">Jumlah Saudara</h6>
                                            <h6 class="text-dark p-l-20"><?=$dataPasien['jmlSaudaraPasien'];?></h6>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="font-weight-bold">Kel.Dekat/No.Hp</h6>
                                        <h6 class="text-dark p-l-20"><?=$dataPasien['kelDekatPasien'];?></h6>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="font-weight-bold">Foto</h6>
                                            <img src="<?=$pathFoto.$foto.'?'.rand(1,32000);?>" class="img-thumbnail img-preview m-b-5" alt="Foto <?=ucwords($dataPasien['namaPasien']);?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <h6 class="font-weight-bold text-gray-800 m-b-20">Data OrangTua/Wali</h6>
                                <div class="scroll-box">
                                    <table class="table table-bordered text-black">
                                        <tr class="font-weight-bold fs-14 text-center bg-gray-400">
                                            <td>No</td>
                                            <td>Nama</td>
                                            <td>Umur</td>
                                            <td>Jenis Kelamin</td>
                                            <td>Agama</td>
                                            <td>Pekerjaan</td>
                                            <td>Alamat</td>
                                            <td>Nomor KTP</td>
                                            <td>Nomor Telepon</td>
                                            <td>Sangkutan Pasien</td>
                                            <td>Aksi</td>
                                        </tr>
                                        <?php
                                            $no=1;
                                            $ortu=mysqli_query($koneksi,"SELECT `idOrtu`, `nama`, `umur`, `jk`, `agama`, `pekerjaan`, `alamat`, `tempatLahir`, `tanggalLahir`, `nomorKTP`, `noTelp`, `type` FROM tb_ortu WHERE idPasien='$idPasien'");  
                                            while($data=mysqli_fetch_array($ortu)){ ?>
                                            <input type="text" name="dataOrtu[]" class="idOrtu" value="<?=$data['idOrtu'];?>">
                                            <tr class="font-weight-bold fs-14">
                                                <td><?=$no++;?></td>
                                                <td><?=ucwords($data['nama']);?></td>
                                                <td><?=$data['umur'];?></td>
                                                <td><?=$data['jk'];?></td>
                                                <td><?=ucwords($data['agama']);?></td>
                                                <td><?=$data['pekerjaan'];?></td>
                                                <td><?=$data['alamat'];?></td>
                                                <td><?=$data['nomorKTP'];?></td>
                                                <td><?=$data['noTelp'];?></td>
                                                <td><?=ucwords($data['type']);?></td>
                                                <td>                                            
                                                    <button type='button' data-a="<?=$data['idOrtu'];?>" href='#editarUsuario' class='modalEditarUsuario btn btn-info btn-sm' data-toggle="modal">
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                        </div>
                    </div>
                <form method="POST">    
                    <div class="card shadow m-b-50">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-gray-800">Asesemen Riwayat Kelahiran</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Usia kandungan cukup bulan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran1" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran1" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kontrol kandungan rutin</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran2" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran2" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kontrol kandungan dokter</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran3" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran3" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kontrol kandungan dukun</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran4" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran4" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Selama mengandung ibu cukup gizi makan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran5" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran5" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Ada penyakit Typhus, Diabetes, Asma, Jantung, Darah Tinggi</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran6" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran6" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Selama mengandung pernah mengalami kecelakakan </label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran7" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran7" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Melahir dengan bantuan dokter</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran8" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran8" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Melahirkan dengan  bantuan bidan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran9" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran9" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">                            
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Melahirkan dengan bantuan dukun</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran10" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran10" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Melahirkan tanpa bantuan ketiganya (dokter, bidan, dukun)</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran11" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran11" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Berat badan waktu lahir</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran12" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran12" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Panjang badan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran13" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran13" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Lahir dalam keadaan sehat/Normal</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran14" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran14" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Lahir dengan vacum</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran15" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran15" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Lahir dengan operasi</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran16" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran16" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Imunisasi cukup lengkap</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran17" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran17" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Pernah step cukup lama</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran18" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran18" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Minum asi</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran19" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran19" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Bantuan susu kaleng</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="dataKelahiran20" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dataKelahiran20" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Skor</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="skorDataKelahiran" id="skorDataKelahiran" class="form-control border-radius-10" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Kesimpulan dan Saran</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="kesimpulanDataKelahiran" id="kesimpulanDataKelahiran" class="form-control border-radius-10" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Rekomendasi</label>
                                            <div class="col-lg-7 col-md-12">
                                                <textarea rows="5" name="RekomendasiDataKelahiran" id="RekomendasiDataKelahiran" class="form-control border-radius-10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="text-center">
                                <input type="button" value="Hitung Hasil" class="btn btn-outline-success" onclick="riwayatKelahiran()">
                            </div>
                        </div>
                    </div>

                    <div class="card shadow m-b-50">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-gray-800">Asesemen Sosial</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Suka menyendiri</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial1" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial1" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Sulit diajak berbicara</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial2" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial2" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Mudah diajak berbicara</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial3" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial3" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Mudah bergaul/bergaul</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial4" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial4" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Sulit bergaul/pilih-pilih teman</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial5" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial5" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Sulit menyesuaikan dengan likungan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial6" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial6" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Mudah menyesuaikan dengan likungan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial7" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial7" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Hanya akrab dengan anggota keluaga tertentu</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial8" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial8" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Akrab dengan seluruh anggota keluarga</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial9" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial9" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Mudah mengenal  orang disekelilingnya </label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="sosial10" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sosial10" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Skor</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="skorSosial" id="skorSosial" class="form-control border-radius-10" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Kesimpulan dan Saran</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="kesimpulanSosial" id="kesimpulanSosial" class="form-control border-radius-10" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Rekomendasi</label>
                                            <div class="col-lg-7 col-md-12">
                                                <textarea rows="5" name="RekomendasiSosial" id="RekomendasiSosial" class="form-control border-radius-10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="text-center">
                                <input type="button" value="Hitung Hasil" class="btn btn-outline-success" onclick="sosial()">
                            </div>
                        </div>
                    </div>
                    
                    <div class="card shadow m-b-50">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-gray-800">Asesemen Mental-Spiritual</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Sholat lima waktu</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual1" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual1" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Sholat bolong-bolong</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual2" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual2" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Suka ikut kegiatan kepramukaan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual3" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual3" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Suka donor darah</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual4" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual4" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Suka membantu orang lain/sedekah</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual5" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual5" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Ikut kegiatan sosial/ PMI/PMR</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual6" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual6" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Suka menjenguk teman yang sakit</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual7" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual7" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Suka ikut aktifitas kemasyarakatan /Misal Yassinan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual8" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual8" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Aktif dalam hari-hari besar agama</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual9" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual9" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Aktif dalam majelis taklim/pengajian</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="spiritual10" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="spiritual10" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Skor</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="skorSpiritual" id="skorSpiritual" class="form-control border-radius-10" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Kesimpulan dan Saran</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="kesimpulanSpiritual" id="kesimpulanSpiritual" class="form-control border-radius-10" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Rekomendasi</label>
                                            <div class="col-lg-7 col-md-12">
                                                <textarea rows="5" name="RekomendasiSpiritual" id="RekomendasiSpiritual" class="form-control border-radius-10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="text-center">
                                <input type="button" value="Hitung Hasil" class="btn btn-outline-success" onclick="spiritual()">
                            </div>
                        </div>
                    </div>

                    <div class="card shadow m-b-50">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-gray-800">Asesemen Penglihatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kebutaan dari lahir</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan1" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan1" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kebutaan masa anak-anak</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan2" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan2" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kebutaan setelah dewasa</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan3" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan3" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kebutaan karena kecelakakan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan4" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan4" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kebutaan karena penyakit</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan5" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan5" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Melihat gelap sama sekali</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan6" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan6" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Melihat berbayang merah</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan7" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan7" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Melihat bayangan benda menetap-bergerak</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan8" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan8" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Berjalan numbur-numbur</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan9" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan9" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Berjalan tidak ada keseimbangan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan10" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan10" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Berjalan miring-miring</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan11" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan11" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Membaca menempel pada buku/didekatkan</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan12" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan12" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Berkacamata tebal</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan13" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan13" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kepala mudah pusing jika membaca</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan14" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan14" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Bola mata tertutup rapat</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan15" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan15" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Bola mata teroid</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan16" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan16" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Kepala suka mengkleng/miring-miring</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan17" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan17" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Bola mata keruh tidak jelas hitam-putihnya</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan18" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan18" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Bila melihat dengan memaksakan bola mata</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan19" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan19" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-12 col-form-label">Mata sering diculek keluar</label>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-check form-check-inline m-t-5">
                                                <input class="form-check-input" type="radio" name="penglihatan20" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan20" value="0">
                                                <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Skor</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="skorPenglihatan" id="skorPenglihatan" class="form-control border-radius-10" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Kesimpulan dan Saran</label>
                                            <div class="col-lg-7 col-md-12">
                                                <input type="text" name="kesimpulanPenglihatan" id="kesimpulanPenglihatan" class="form-control border-radius-10" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-md-12 col-form-label">Rekomendasi</label>
                                            <div class="col-lg-7 col-md-12">
                                                <textarea rows="5" name="RekomendasiPenglihatan" id="RekomendasiPenglihatan" class="form-control border-radius-10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="text-center">
                                <input type="button" value="Hitung Hasil" class="btn btn-outline-success" onclick="penglihatan()">
                            </div>
                        </div>
                        <hr>
                        <div class="text-center m-t-20 m-b-20">
                            <input type="button" value="Simpan Data Asesmen" name="simpan" onclick="sendData('<?=$idPasien;?>')" class="btn btn-primary">
                        </div>
                    </div>
            <!-- Content Row -->
                </form>
            
        </div>
        <!-- modals -->
        <div id="editarUsuario" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
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

    <!-- Alert -->
    <script src="../assets/vendor/alertify/alertify.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#idPasien').hide();
            $('.idOrtu').hide();
            $('.modalEditarUsuario').click(function(){
                var idOrtu=$(this).attr('data-a');
                $.ajax({
                    url:"php/detailModal.php?id="+idOrtu,
                    cache:false,
                    success:function(result){
                        $(".modal-content").html(result);
                    }
                });
            });
            
        });
        function sendData(id){

            var dataFrom={
                idPasien:id,
                dataKelahiran1:$('input[name="dataKelahiran1"]:checked').val(),
                dataKelahiran2:$('input[name="dataKelahiran2"]:checked').val(),
                dataKelahiran3:$('input[name="dataKelahiran3"]:checked').val(),
                dataKelahiran4:$('input[name="dataKelahiran4"]:checked').val(),
                dataKelahiran5:$('input[name="dataKelahiran5"]:checked').val(),
                dataKelahiran6:$('input[name="dataKelahiran6"]:checked').val(),
                dataKelahiran7:$('input[name="dataKelahiran7"]:checked').val(),
                dataKelahiran8:$('input[name="dataKelahiran8"]:checked').val(),
                dataKelahiran9:$('input[name="dataKelahiran9"]:checked').val(),
                dataKelahiran10:$('input[name="dataKelahiran10"]:checked').val(),
                dataKelahiran11:$('input[name="dataKelahiran11"]:checked').val(),
                dataKelahiran12:$('input[name="dataKelahiran12"]:checked').val(),
                dataKelahiran13:$('input[name="dataKelahiran13"]:checked').val(),
                dataKelahiran14:$('input[name="dataKelahiran14"]:checked').val(),
                dataKelahiran15:$('input[name="dataKelahiran15"]:checked').val(),
                dataKelahiran16:$('input[name="dataKelahiran16"]:checked').val(),
                dataKelahiran17:$('input[name="dataKelahiran17"]:checked').val(),
                dataKelahiran18:$('input[name="dataKelahiran18"]:checked').val(),
                dataKelahiran19:$('input[name="dataKelahiran19"]:checked').val(),
                dataKelahiran20:$('input[name="dataKelahiran20"]:checked').val(),
                sosial1:$('input[name="sosial1"]:checked').val(),
                sosial2:$('input[name="sosial2"]:checked').val(),
                sosial3:$('input[name="sosial3"]:checked').val(),
                sosial4:$('input[name="sosial4"]:checked').val(),
                sosial5:$('input[name="sosial5"]:checked').val(),
                sosial6:$('input[name="sosial6"]:checked').val(),
                sosial7:$('input[name="sosial7"]:checked').val(),
                sosial8:$('input[name="sosial8"]:checked').val(),
                sosial9:$('input[name="sosial9"]:checked').val(),
                sosial10:$('input[name="sosial10"]:checked').val(),
                spiritual1:$('input[name="spiritual1"]:checked').val(),
                spiritual2:$('input[name="spiritual2"]:checked').val(),
                spiritual3:$('input[name="spiritual3"]:checked').val(),
                spiritual4:$('input[name="spiritual4"]:checked').val(),
                spiritual5:$('input[name="spiritual5"]:checked').val(),
                spiritual6:$('input[name="spiritual6"]:checked').val(),
                spiritual7:$('input[name="spiritual7"]:checked').val(),
                spiritual8:$('input[name="spiritual8"]:checked').val(),
                spiritual9:$('input[name="spiritual9"]:checked').val(),
                spiritual10:$('input[name="spiritual10"]:checked').val(),
                penglihatan1:$('input[name="penglihatan1"]:checked').val(),
                penglihatan2:$('input[name="penglihatan2"]:checked').val(),
                penglihatan3:$('input[name="penglihatan3"]:checked').val(),
                penglihatan4:$('input[name="penglihatan4"]:checked').val(),
                penglihatan5:$('input[name="penglihatan5"]:checked').val(),
                penglihatan6:$('input[name="penglihatan6"]:checked').val(),
                penglihatan7:$('input[name="penglihatan7"]:checked').val(),
                penglihatan8:$('input[name="penglihatan8"]:checked').val(),
                penglihatan9:$('input[name="penglihatan9"]:checked').val(),
                penglihatan10:$('input[name="penglihatan10"]:checked').val(),
                penglihatan11:$('input[name="penglihatan11"]:checked').val(),
                penglihatan12:$('input[name="penglihatan12"]:checked').val(),
                penglihatan13:$('input[name="penglihatan13"]:checked').val(),
                penglihatan14:$('input[name="penglihatan14"]:checked').val(),
                penglihatan15:$('input[name="penglihatan15"]:checked').val(),
                penglihatan16:$('input[name="penglihatan16"]:checked').val(),
                penglihatan17:$('input[name="penglihatan17"]:checked').val(),
                penglihatan18:$('input[name="penglihatan18"]:checked').val(),
                penglihatan19:$('input[name="penglihatan19"]:checked').val(),
                penglihatan20:$('input[name="penglihatan20"]:checked').val(),
                skorPenglihatan:$('#skorPenglihatan').val(),
                kesimpulanPenglihatan:$('#kesimpulanPenglihatan').val(),
                RekomendasiPenglihatan:$('#RekomendasiPenglihatan').val(),
                skorSpiritual:$('#skorSpiritual').val(),
                kesimpulanSpiritual:$('#kesimpulanSpiritual').val(),
                RekomendasiSpiritual:$('#RekomendasiSpiritual').val(),
                skorDataKelahiran:$('#skorDataKelahiran').val(),
                kesimpulanDataKelahiran:$('#kesimpulanDataKelahiran').val(),
                RekomendasiDataKelahiran:$('#RekomendasiDataKelahiran').val(),
                skorSosial:$('#skorSosial').val(),
                kesimpulanSosial:$('#kesimpulanSosial').val(),
                RekomendasiSosial:$('#RekomendasiSosial').val(),
                perform:'update'
            };    
            $.ajax({
                type:'POST',
                url:'php/assesmen.php',
                data:dataFrom,
                success: function(response){
                    if (response=='success') {
                        alertify.set('notifier','position', 'top-center');
                        var duration = 1.5;
                        var msg = alertify.success('', 1.5, function(){ clearInterval(interval); 
                        window.location.assign('infoAsesmen_pasien');});
                        var interval = setInterval(function(){
                            msg.setContent('Asesmen Berhasil');
                        },150);                
                    } else {
                        alertify.set('notifier','delay', 1.5);
                        alertify.error('Asesmen Gagal');
                    }
                }
            });
            console.log(dataFrom);
        }
        $('#simpanData').click(function(){

        });
        function validasi(type){
            if (type=='Ayah') {
                var value = document.getElementById('umurAyah').value;
                if (value<1||value>=100) {
                    document.getElementById('umurAyah').value='';
                    document.getElementById('errorUsiaAyah').innerHTML='Tidak Boleh Kurang dari 1 dan Lebih dari 100';
                }else{
                    document.getElementById('errorUsiaAyah').innerHTML='';
                }
            }else if (type=='Ibu') {
                var value = document.getElementById('umurIbu').value;
                if (value<1||value>=100) {
                    document.getElementById('umurIbu').value='';
                    document.getElementById('errorUsiaIbu').innerHTML='Tidak Boleh Kurang dari 1 dan Lebih dari 100';
                }else{
                    document.getElementById('errorUsiaIbu').innerHTML='';
                }
            }
        }

        function riwayatKelahiran(){
            var dataKelahiran = 0;
            var cekValue=1
            for (let index = 1; index <=20; index++) {
                let value = $("input[name='dataKelahiran"+index+"']:checked ").val();
                if (value) {
                    cekValue=1
                }else{
                    cekValue=0
                }
                if (value!=0){
                    dataKelahiran++
                }                
            }            
            if (cekValue==0){
                alertify.dialog('alert').set({transition:'zoom',message: 'Cek Data Dengan Benar', basic:'true'}).show(); 

            }else{
                dataKelahiran=dataKelahiran*5;
                var total=100/dataKelahiran;
                var pembulatan = total.toFixed(2);
                document.getElementById('skorDataKelahiran').value=pembulatan;
            }
            console.log(cekValue);
        }

        function sosial(){
            var sosial = 0;
            var cekValue=1
            for (let index = 1; index <=10; index++) {
                let value = $("input[name='sosial"+index+"']:checked ").val();
                if (value) {
                    cekValue=1
                }else{
                    cekValue=0
                }
                if (value!=0){
                    sosial++
                }                
            }            
            if (cekValue==0){
                alertify.dialog('alert').set({transition:'zoom',message: 'Cek Data Dengan Benar', basic:'true'}).show(); 

            }else{
                sosial=sosial*5;
                var total=100/sosial;
                var pembulatan = total.toFixed(2);
                document.getElementById('skorSosial').value=pembulatan;
            }
            console.log(cekValue);
        }

        function spiritual(){
            var spiritual = 0;
            var cekValue=1
            for (let index = 1; index <=10; index++) {
                let value = $("input[name='spiritual"+index+"']:checked ").val();
                if (value) {
                    cekValue=1
                }else{
                    cekValue=0
                }
                if (value!=0){
                    spiritual++
                }                
            }            
            if (cekValue==0){
                alertify.dialog('alert').set({transition:'zoom',message: 'Cek Data Dengan Benar', basic:'true'}).show(); 

            }else{
                spiritual=spiritual*5;
                var total=100/spiritual;
                var pembulatan = total.toFixed(2);
                document.getElementById('skorSpiritual').value=pembulatan;
            }
            console.log(cekValue);
        }

        function penglihatan(){
            var penglihatan = 0;
            var cekValue=1
            for (let index = 1; index <=10; index++) {
                let value = $("input[name='penglihatan"+index+"']:checked ").val();
                if (value) {
                    cekValue=1
                }else{
                    cekValue=0
                }
                if (value!=0){
                    penglihatan++
                }                
            }            
            if (cekValue==0){
                alertify.dialog('alert').set({transition:'zoom',message: 'Cek Data Dengan Benar', basic:'true'}).show(); 

            }else{
                penglihatan=penglihatan*5;
                var total=100/penglihatan;
                var pembulatan = total.toFixed(2);
                document.getElementById('skorPenglihatan').value=pembulatan;
            }
            console.log(cekValue);
        }

        
    </script>
</body>
</html>