<?php session_start(); ?>
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
                <h1 class="h3 text-gray-900">Input Data Klien</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="card shadow m-b-50">
                <div class="card-body">
                    <form action="php/proses_klien" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Nama</label>
                                    <input type="text" name="namaOT" class="form-control border-radius-10" required >
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Umur</label>
                                    <input type="number" name="umur" min="1" max="100" id="umur" class="form-control border-radius-10" onchange="validasi('number')" required>
                                    <span class="text-danger small" id="errorUsia"></span>
                                </div>
                                <div class="form-group">
                                <label class="text-dark">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1" value="L" required>
                                        <label class="form-check-label text-dark" for="inlineRadio1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline text-dark">
                                        <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="P" required>
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Masalah</label>
                                    <textarea name="masalah" class="form-control border-radius-10" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Asal</label>
                                    <input type="text" name="asal" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control border-radius-10" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control border-radius-10" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Surat Keterangan Kepolisian</label>
                                    <input type="file" name="skKepolisian" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Foto</label><br>
                                    <img id="previewImg" src="../assets/img/dumimage.png" class="img-thumbnail img-preview m-b-5" alt="your image" />
                                    <input type="file" name="foto" class="form-control border-radius-10" id="imgPasien">
                                </div>
                                <div class="button-group">
                                    <input type="submit" value="Simpan" name="input_ot" class="btn btn-primary">
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