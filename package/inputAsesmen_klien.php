<?php
    if ($_GET['id']) {
        $idUser = $_GET['id'];
        session_start();
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
    <link rel="stylesheet" href="../assets/vendor/alertify/css/alertify.min.css" />
    <link rel="stylesheet" href="../assets/vendor/alertify/css/themes/default.min.css" />
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
                    <h1 class="h3 text-gray-800">Input Assesmen Klien</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                </div>

                <form action="php/assesmen.php" method="POST">
                <!-- Content Row -->
                <div class="card shadow m-b-50">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-800">Biodata Kelahiran</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                            <h6 class="font-weight-bold m-b-15">Identitas Calon Penghuni Panti </h6>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Nama Ayah</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="namaAyah" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Umur</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="number" name="umurAyah" min="1" max="100" id="umurAyah" class="form-control border-radius-10" onchange="validasi('Ayah')" required>
                                    <span class="text-danger small" id="errorUsiaAyah"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Jenis Kelamin</label>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="jenisKelaminAyah" id="inlineCheckbox1" value="L">
                                            <label class="form-check-label" for="inlineCheckbox1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelaminAyah" id="inlineCheckbox1" value="P">
                                            <label class="form-check-label" for="inlineCheckbox1">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Agama</label>
                                    <div class="col-lg-9 col-md-12">
                                    <select name='agamaAyah' class="form-control border-radius-10">
                                        <option value='0' selected hidden>-- Pilih Agama --</option>
                                        <option value='islam'>Islam</option>
                                        <option value='kristen'>Kristen</option>
                                        <option value='katholik'>Katholik</option>
                                        <option value='hindu'>Hindu</option>
                                        <option value='kristen'>Budha</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Pekerjaan</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="kerjaanAyah" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Alamat</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="alamatAyah" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <hr class="devinder">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Nama Ibu</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="namaIbu" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Umur</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="number" name="umurIbu" min="1" max="100" id="umurIbu" class="form-control border-radius-10" onchange="validasi('Ibu')" required>
                                    <span class="text-danger small" id="errorUsiaIbu"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Jenis Kelamin</label>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="jenisKelaminIbu" id="inlineCheckbox1" value="L">
                                            <label class="form-check-label" for="inlineCheckbox1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelaminIbu" id="inlineCheckbox1" value="P">
                                            <label class="form-check-label" for="inlineCheckbox1">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Agama</label>
                                    <div class="col-lg-9 col-md-12">
                                    <select name='agamaIbu' class="form-control border-radius-10">
                                        <option value='0' selected hidden>-- Pilih Agama --</option>
                                        <option value='islam'>Islam</option>
                                        <option value='kristen'>Kristen</option>
                                        <option value='katholik'>Katholik</option>
                                        <option value='hindu'>Hindu</option>
                                        <option value='kristen'>Budha</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Pekerjaan</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="kerjaanIbu" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Alamat</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="alamatIbu" class="form-control border-radius-10">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h6 class="font-weight-bold m-b-15">Identitas Calon Penghuni Panti </h6>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Nama</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="namaPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Tempat, Tanggal Lahir</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="ttlPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Anak Ke-</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="anakPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Jenis Kelamin</label>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="jenisKelaminPasien" id="inlineCheckbox1" value="L">
                                            <label class="form-check-label" for="inlineCheckbox1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelaminPasien" id="inlineCheckbox1" value="P">
                                            <label class="form-check-label" for="inlineCheckbox1">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Agama</label>
                                    <div class="col-lg-9 col-md-12">
                                    <select name='agamaPasien' class="form-control border-radius-10">
                                        <option value='0' selected hidden>-- Pilih Agama --</option>
                                        <option value='islam'>Islam</option>
                                        <option value='kristen'>Kristen</option>
                                        <option value='katholik'>Katholik</option>
                                        <option value='hindu'>Hindu</option>
                                        <option value='kristen'>Budha</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="pendidikanPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Status</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="statusPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Golongan Darah</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="golPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Pekerjaan</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="kerjaanPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Jumlah Saundara</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="jmlSaudaraPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-md-12 col-form-label">Kel.Dekat/No.Hp</label>
                                    <div class="col-lg-9 col-md-12">
                                    <input type="text" name="kelDekatPasien" class="form-control border-radius-10">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                            <input class="form-check-input" type="radio" name="usiaKandungan" id="dataKelahiranKelahiran1" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="usiaKandungan" id="dataKelahiran1" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kontrol kandungan rutin</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="kontrolKandunganRutin" id="dataKelahiran2" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kontrolKandunganRutin" id="dataKelahiran2" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kontrol kandungan dokter</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="kontrolKandunganDokter" id="dataKelahiran3" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kontrolKandunganDokter" id="dataKelahiran3" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kontrol kandungan dukun</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="kontrolKandunganDukun" id="dataKelahiran4" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kontrolKandunganDukun" id="dataKelahiran4" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Selama mengandung ibu cukup gizi makan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="gizi" id="dataKelahiran5" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gizi" id="dataKelahiran5" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Ada penyakit Typhus, Diabetes, Asma, Jantung, Darah Tinggi</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penyakit" id="dataKelahiran6" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penyakit" id="dataKelahiran6" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Selama mengandung pernah mengalami kecelakakan </label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="kecelakaan" id="dataKelahiran7" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kecelakaan" id="dataKelahiran7" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Melahir dengan bantuan dokter</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="bantuanDokter" id="dataKelahiran8" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bantuanDokter" id="dataKelahiran8" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Melahirkan dengan  bantuan bidan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="bantuanBidan" id="dataKelahiran9" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bantuanBidan" id="dataKelahiran9" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Melahirkan dengan bantuan dukun</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="bantuanDukun" id="dataKelahiran10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bantuanDukun" id="dataKelahiran10" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">                            
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Melahirkan tanpa bantuan ketiganya (dokter, bidan, dukun)</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="tanpaBantuan" id="dataKelahiran11" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tanpaBantuan" id="dataKelahiran11" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Berat badan waktu lahir</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="beratBadan" id="dataKelahiran12" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="beratBadan" id="dataKelahiran12" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Panjang badan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="panjangBadan" id="dataKelahiran13" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="panjangBadan" id="dataKelahiran13" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Lahir dalam keadaan sehat/Normal</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="keadaanLahir" id="dataKelahiran14" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="keadaanLahir" id="dataKelahiran14" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Lahir dengan vacum</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="keadaanLahirVacum" id="dataKelahiran15" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="keadaanLahirVacum" id="dataKelahiran15" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Lahir dengan operasi</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="keadaanLahirOperasi" id="dataKelahiran16" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="keadaanLahirOperasi" id="dataKelahiran16" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Imunisasi cukup lengkap</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="imunisasi" id="dataKelahiran17" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="imunisasi" id="dataKelahiran17" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Pernah step cukup lama</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penyakitStep" id="dataKelahiran18" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penyakitStep" id="dataKelahiran18" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Minum asi</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="minumAsi" id="dataKelahiran19" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="minumAsi" id="dataKelahiran19" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Bantuan susu kaleng</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="bantuanSusu" id="dataKelahiran20" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bantuanSusu" id="dataKelahiran20" value="0">
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
                                            <input class="form-check-input" type="radio" name="sosial1" id="sosial1" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial1" id="sosial1" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Sulit diajak berbicara</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial2" id="sosial2" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial2" id="sosial2" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Mudah diajak berbicara</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial3" id="sosial3" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial3" id="sosial3" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Mudah bergaul/bergaul</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial4" id="sosial4" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial4" id="sosial4" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Sulit bergaul/pilih-pilih teman</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial5" id="sosial5" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial5" id="sosial5" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Sulit menyesuaikan dengan likungan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial6" id="sosial6" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial6" id="sosial6" value="0">
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
                                            <input class="form-check-input" type="radio" name="sosial7" id="sosial7" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial7" id="sosial7" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Hanya akrab dengan anggota keluaga tertentu</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial8" id="sosial8" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial8" id="sosial8" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Akrab dengan seluruh anggota keluarga</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial9" id="sosial9" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial9" id="sosial9" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Mudah mengenal  orang disekelilingnya </label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="sosial10" id="sosial10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sosial10" id="sosial10" value="0">
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
                                            <input class="form-check-input" type="radio" name="spiritual1" id="spiritual1" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual1" id="spiritual1" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Sholat bolong-bolong</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual2" id="spiritual2" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual2" id="spiritual2" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Suka ikut kegiatan kepramukaan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual3" id="spiritual3" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual3" id="spiritual3" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Suka donor darah</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual4" id="spiritual4" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual4" id="spiritual4" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Suka membantu orang lain/sedekah</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual5" id="spiritual5" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual5" id="spiritual5" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Ikut kegiatan sosial/ PMI/PMR</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual6" id="spiritual6" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual6" id="spiritual6" value="0">
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
                                            <input class="form-check-input" type="radio" name="spiritual7" id="spiritual7" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual7" id="spiritual7" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Suka ikut aktifitas kemasyarakatan /Misal Yassinan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual8" id="spiritual8" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual8" id="spiritual8" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Aktif dalam hari-hari besar agama</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual9" id="spiritual9" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual9" id="spiritual9" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Aktif dalam majelis taklim/pengajian</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="spiritual10" id="spiritual10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="spiritual10" id="spiritual10" value="0">
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
                                            <input class="form-check-input" type="radio" name="penglihatan1" id="penglihatan1" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan1" id="penglihatan1" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kebutaan masa anak-anak</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan2" id="penglihatan2" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan2" id="penglihatan2" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kebutaan setelah dewasa</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan3" id="penglihatan3" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan3" id="penglihatan3" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kebutaan karena kecelakakan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan4" id="penglihatan4" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan4" id="penglihatan4" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kebutaan karena penyakit</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan5" id="penglihatan5" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan5" id="penglihatan5" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Melihat gelap sama sekali</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan6" id="penglihatan6" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan6" id="penglihatan6" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Melihat berbayang merah</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan7" id="penglihatan7" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan7" id="penglihatan7" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Melihat bayangan benda menetap-bergerak</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan8" id="penglihatan8" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan8" id="penglihatan8" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Berjalan numbur-numbur</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan9" id="penglihatan9" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan9" id="penglihatan9" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Berjalan tidak ada keseimbangan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="0">
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
                                            <input class="form-check-input" type="radio" name="penglihatan7" id="penglihatan7" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan7" id="penglihatan7" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Membaca menempel pada buku/didekatkan</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan8" id="penglihatan8" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan8" id="penglihatan8" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Berkacamata tebal</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan9" id="penglihatan9" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan9" id="penglihatan9" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kepala mudah pusing jika membaca</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Bola mata tertutup rapat</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan7" id="penglihatan7" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan7" id="penglihatan7" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Bola mata teroid</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan8" id="penglihatan8" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan8" id="penglihatan8" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Kepala suka mengkleng/miring-miring</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan9" id="penglihatan9" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan9" id="penglihatan9" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Bola mata keruh tidak jelas hitam-putihnya</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Bila melihat dengan memaksakan bola mata</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 col-form-label">Mata sering diculek keluar</label>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-check form-check-inline m-t-5">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="1">
                                            <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penglihatan10" id="penglihatan10" value="0">
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
                    <input type="submit" value="Simpan Data" name="simpan" class="btn btn-primary">
            </div>

            <!-- Content Row -->
            </form>
            
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
                let value = $("#dataKelahiran"+index+":checked ").val();
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
                let value = $("#sosial"+index+":checked ").val();
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
                let value = $("#spiritual"+index+":checked ").val();
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
                let value = $("#penglihatan"+index+":checked ").val();
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