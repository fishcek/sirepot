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
    <title>Input Surat Pernyataan | Sirepot</title>
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
                <h1 class="h3 text-gray-900">Input Surat Pernyataan</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="card shadow m-b-50">
                <div class="card-body">
                    <form action="php/proses_pasien" method="post" enctype="multipart/form-data">
                    <h6 class="text-dark font-weight-bold m-b-20">Data Pasien</h6>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Nama Anak</label>
                                    <input type="text" name="namaAnak" class="form-control border-radius-10">
                                </div> 
                                <div class="form-group">
                                    <label class="text-dark">Tempat Lahir</label>
                                    <input type="text" name="tempatLahirAnak" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Tanggal Lahir</label>
                                    <input type="date" name="tanggalLahirAnak" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Tanggal Masuk Panti</label>
                                    <input type="date" name="tanggalMasukPanti" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Anak Ke-</label>
                                    <input type="text" name="anakPasien" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Jenis Kelamin</label>
                                        <select class="form-control border-radius-10" name="jenisKelaminPasien">
                                            <option selected hidden>--Pilih Jenis Kelamin--</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Agama</label>
                                    <select name='agamaPasien' class="form-control border-radius-10">
                                        <option value='0' selected hidden>-- Pilih Agama --</option>
                                        <option value='islam'>Islam</option>
                                        <option value='kristen'>Kristen</option>
                                        <option value='katholik'>Katholik</option>
                                        <option value='hindu'>Hindu</option>
                                        <option value='kristen'>Budha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Pendidikan Terakhir</label>                                    
                                    <input type="text" name="pendidikanPasien" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Status Perkawinan</label>                                    
                                    <input type="text" name="statusPasien" class="form-control border-radius-10">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Golongan Darah</label>                                    
                                    <input type="text" name="golPasien" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Pekerjaan</label>                                    
                                    <input type="text" name="kerjaanPasien" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Jumlah Saundara</label>                                    
                                    <input type="text" name="jmlSaudaraPasien" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Kel.Dekat/No.Hp</label>                                    
                                    <input type="text" name="kelDekatPasien" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Foto Pasien <br><span class="small text-gray-700">(.JPG, .JPEG, .PNG Maksimal 1.5MB)</span></label><br>
                                    <img id="previewImg" src="../assets/img/dumimage.png" class="img-thumbnail img-preview m-b-5" alt="your image" />
                                    <input type="file" name="foto" class="form-control border-radius-10" id="imgPasien">
                                </div>                            
                            </div>
                        </div>
                    <hr>
                    <h6 class="text-dark font-weight-bold m-b-20">Data Wali/Orang Tua Pasien</h6>
                                <div class="form-group">
                                    <label class="text-dark">Wali/Ayah/Ibu</label>
                                    <select name='tipeWali' id="tipeWali" class="form-control border-radius-10" onchange="pilihWali(this.value)">
                                        <option value='' selected hidden>-- Pilih Wali --</option>
                                        <option value='1'>Wali</option>
                                        <option value='2'>Ayah</option>
                                        <option value='3'>Ibu</option>
                                    </select>
                                </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12" id="inputWali">
                                <div>                            
                                    <div class="form-group">
                                        <label class="text-dark">Nama Wali</label>
                                        <input type="text" name="wali[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Usia</label>
                                        <input type="number" name="wali[]" min="1" max="100" id="umurWali" class="form-control border-radius-10" onchange="validasi('Wali')" >
                                        <span class="text-danger small" id="errorUsiaWali"></span>
                                    </div>                                
                                    <div class="form-group">
                                        <label class="text-dark">Jenis Kelamin</label>
                                        <select class="form-control border-radius-10" name="wali[]">
                                            <option selected hidden>--Pilih Jenis Kelamin--</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Agama</label>
                                        <select name='wali[]' class="form-control border-radius-10">
                                            <option value='0' selected hidden>-- Pilih Agama --</option>
                                            <option value='islam'>Islam</option>
                                            <option value='kristen'>Kristen</option>
                                            <option value='katholik'>Katholik</option>
                                            <option value='hindu'>Hindu</option>
                                            <option value='kristen'>Budha</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Pekerjaan</label>                                    
                                        <input type="text" name="wali[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Alamat</label>                                    
                                        <input type="text" name="wali[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tempat Lahir</label>
                                        <input type="text" name="wali[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tanggal Lahir</label>
                                        <input type="date" name="wali[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Nomor KTP</label>
                                        <input type="number" min='0' name="wali[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Nomor HP/Telp</label>
                                        <input type="number" min='0' name="wali[]" class="form-control border-radius-10">
                                    </div>          
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" id="inputAyah">  
                                <div >                                
                                    <div class="form-group">
                                        <label class="text-dark">Nama Ayah</label>
                                        <input type="text" name="ayah[]" class="form-control border-radius-10" >
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Umur</label>
                                        <input type="number" name="ayah[]" min="1" max="100" id="umurAyah" class="form-control border-radius-10" onchange="validasi('Ayah')" >
                                        <span class="text-danger small" id="errorUsiaAyah"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Jenis Kelamin</label>
                                        <input type="text" name="ayah[]" id="jenisKelaminAyah" value="Laki-Laki" class="form-control border-radius-10" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Agama</label>
                                        <select name='ayah[]' class="form-control border-radius-10" id="agamaAyah">
                                            <option value='0' selected hidden>-- Pilih Agama --</option>
                                            <option value='islam'>Islam</option>
                                            <option value='kristen'>Kristen</option>
                                            <option value='katholik'>Katholik</option>
                                            <option value='hindu'>Hindu</option>
                                            <option value='kristen'>Budha</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Pekerjaan</label>                                    
                                        <input type="text" name="ayah[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Alamat</label>                                    
                                        <input type="text" name="ayah[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tempat Lahir</label>
                                        <input type="text" name="ayah[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tanggal Lahir</label>
                                        <input type="date" name="ayah[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Nomor KTP</label>
                                        <input type="number" min='0' name="ayah[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Nomor HP/Telp</label>
                                        <input type="number" min='0' name="ayah[]" class="form-control border-radius-10">
                                    </div> 
                                </div> 
                            </div>
                            <div class="col-lg-6"  id="inputIbu">
                                <div>
                                    <div class="form-group">
                                        <label class="text-dark">Nama Ibu</label>                                    
                                        <input type="text" name="ibu[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Umur</label>                                    
                                        <input type="number" name="ibu[]" min="1" max="100" id="umurIbu" class="form-control border-radius-10" onchange="validasi('Ibu')" >
                                        <span class="text-danger small" id="errorUsiaIbu"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Jenis Kelamin</label>                          
                                        <input type="text" name="ibu[]" id="jenisKelaminIbu" value="Perempuan" class="form-control border-radius-10" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Agama</label>                                    
                                        <select name='ibu[]' class="form-control border-radius-10">
                                            <option value='0' selected hidden>-- Pilih Agama --</option>
                                            <option value='islam'>Islam</option>
                                            <option value='kristen'>Kristen</option>
                                            <option value='katholik'>Katholik</option>
                                            <option value='hindu'>Hindu</option>
                                            <option value='kristen'>Budha</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Pekerjaan</label>                                    
                                        <input type="text" name="ibu[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Alamat</label>                                    
                                        <input type="text" name="ibu[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tempat Lahir</label>
                                        <input type="text" name="ibu[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tanggal Lahir</label>
                                        <input type="date" name="ibu[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Nomor KTP</label>
                                        <input type="number" min='0' name="ibu[]" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Nomor HP/Telp</label>
                                        <input type="number" min='0' name="ibu[]" class="form-control border-radius-10">
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                                                     
                                
                        <div class="button-group">
                            <input type="submit" value="Simpan" name="input_pernyataan" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-danger">
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
        function pilihWali(params) {
            console.log(params);
            switch (params) {
                case '2':
                    $('#inputWali').hide();                   
                    break;
                case '3':
                    $('#inputWali').hide();         
                    break; 
                default:
                    $('#inputWali').show(); 
                    break;
            }
            
        }
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

            let foto = document.getElementById('imgPasien');
            let fotoSize=foto.files.item(0).size;
            let fotoName=foto.files.item(0).name;
            let fileType = fotoName.split(".");
            let acceptFile = ['jpg', 'png', 'jpeg'];
            alertify.set('notifier','position', 'top-center');
            if (!acceptFile.includes(fileType[1])  ) {                
                alertify.error('Tipe File Tidak Sesuai');
                foto.value='';
            }else if(fotoSize>=1572864){
                alertify.error('Ukuran File Terlalu Besar');
                foto.value='';
            }else{
                const [file] = imgPasien.files
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
                }
            }
        }
    </script>
</body>
</html>