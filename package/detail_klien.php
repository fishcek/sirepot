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
                <h1 class="h3 text-gray-900">Data Klien <?=$idUser;?></h1>
                <a href="infoData_klien" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Kembali</a>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="card shadow m-b-50">
                <div class="card-body">
                    <form action="php/proses_klien" id="formUser" method="post" enctype="multipart/form-data">
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
                                    <input type="text" id="txtJK" class="form-control border-radius-10" required >
                                    <div id="jenisKelamin">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio1" value="1" required>
                                            <label class="form-check-label text-dark" for="inlineRadio1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline text-dark">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="inlineRadio2" value="0" required>
                                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                        </div>
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
                                    <input type="date" name="tanggal" id="tanggal" class="form-control border-radius-10" required>
                                    <input type="text" id="txtTanggal" class="form-control border-radius-10" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Surat Keterangan Kepolisian</label>
                                    <div class="input-group mb-3" id="viewKepolisian">
                                        <input type="text" class="form-control border-radius-10" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" type="button">Lihat Dokumen</button>
                                        </div>
                                    </div>
                                    <input type="file" name="skKepolisian" id="skKepolisian" class="form-control border-radius-10">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Foto</label><br>
                                    <img id="previewImg" src="../assets/img/dumimage.png" class="img-thumbnail img-preview m-b-5" alt="your image" />
                                    <input type="file" name="foto" class="form-control border-radius-10" id="imgPasien">
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

        $(document).ready(function() {
            $('#jenisKelamin').hide();
            $('#tanggal').hide();
            $('#imgPasien').hide();
            $('#skKepolisian').hide();
            $('#btnSimpan').hide();
            $('#btnBatal').hide();
            $("#formUser :input").prop('readonly', true);

            $('#btnEdit').click(function(){
                $('#viewKepolisian').hide();
                $('#skKepolisian').show();
                $('#imgPasien').show();
                $('#txtTanggal').hide();
                $('#txtJK').hide();
                $('#jenisKelamin').show();
                $('#tanggal').show();
                $('#btnEdit').hide();
                $('#btnSimpan').show();
                $('#btnBatal').show();
                $("#formUser :input").prop('readonly', false);
            });

            $('#btnBatal').click(function(){
                $('#jenisKelamin').hide();
                $('#txtTanggal').show();
                $('#tanggal').hide();
                $('#imgPasien').hide();
                $('#viewKepolisian').show();
                $('#skKepolisian').hide();
                $('#txtJK').show();
                $('#jenisKelamin').hide();
                $('#btnSimpan').hide();
                $('#btnBatal').hide();
                $('#btnEdit').show();
                $("#formUser :input").prop('readonly', true);
            });
        });

    </script>
</body>
</html>