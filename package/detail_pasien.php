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
    <title>Detail Pasien | SiRepot</title>
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
                <h1 class="h3 text-gray-900">Info Data Pasien</h1>
                <a href="infoData_pasien" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Kembali</a>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

            <!-- Content Row -->
            <div class="card shadow m-b-20">
                <div class="card-body">
                    <form id="formUser" method="post" enctype="multipart/form-data">
                        <h6 class="font-weight-bold text-gray-800 m-b-20">Data Pasien</h6>
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
                        <div id="formEdit">                        
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark">ID Pasien</label>
                                        <input type="text" name="idPasien" id="idPasien" value="<?=$idPasien;?>" class="form-control border-radius-10" >
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Nama</label>
                                        <input type="text" name="namaPasien" id="namaPasien" value="<?=$nama;?>" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tempat Lahir</label>
                                        <input type="text" name="tempatLahir" id="tempatLahir" value="<?=$tempatLahir;?>" class="form-control border-radius-10" >
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tanggal Lahir</label>
                                        <input type="date" name="tanggalLahir" value="<?=$tanggalLahirEdit;?>" id="tanggalLahir" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Tanggal Masuk Panti</label>
                                        <input type="date" name="tanggalMasukPanti" value="<?=$tanggalMasukPantiEdit;?>" id="tanggalMasukPanti" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Anak Ke</label>
                                        <input type="text" name="anakKe" value="<?=$dataPasien['anak'];?>" id="anakKe" class="form-control border-radius-10">
                                    </div>                                
                                    <div class="form-group">
                                        <label class="text-dark">Jenis Kelamin</label>
                                        <select name="jenisKelamin" id="jenisKelamin" class="form-control border-radius-10">
                                            <option value="L" <?=$selectedL;?>>Laki-Laki</option>
                                            <option value="P" <?=$selectedP;?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Agama</label>
                                        <select name="agamaPasien" id="agamaPasien" class="form-control border-radius-10">
                                            <option value='0' selected hidden>-- Pilih Agama --</option>
                                            <option value='islam' <?=$selectedIslam;?>>Islam</option>
                                            <option value='kristen' <?=$selectedKristen;?>>Kristen</option>
                                            <option value='katholik' <?=$selectedKatholik;?>>Katholik</option>
                                            <option value='hindu' <?=$selectedHindu;?>>Hindu</option>
                                            <option value='kristen' <?=$selectedBudha;?>>Budha</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Pendidikan Terakhir</label>
                                        <input type="text" id="pendidikanTerakhir" value="<?=$dataPasien['pendidikanPasien'];?>" class="form-control border-radius-10" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-dark">Status Perkawinan</label>
                                        <input type="text" id="statusPerkawinan" value="<?=$dataPasien['statusPasien'];?>" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Golongan Darah</label>
                                        <input type="text" id="golonganDarah" value="<?=$dataPasien['golPasien'];?>" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Pekerjaan</label>
                                        <input type="text" id="pekerjaanPasien" value="<?=$dataPasien['kerjaanPasien'];?>" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Jumlah Saudara</label>
                                        <input type="text" id="jumlahSaudara" value="<?=$dataPasien['jmlSaudaraPasien'];?>" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Kel.Dekat/No.Hp</label>
                                    <input type="text" id="kelDekat" value="<?=$dataPasien['kelDekatPasien'];?>" class="form-control border-radius-10">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Foto</label><br>
                                        <img id="previewImg" src="<?=$pathFoto.$foto.'?'.rand(1,32000);?>" class="img-thumbnail img-preview m-b-5" alt="your image" />
                                        <input type="file" name="fileupload" class="form-control border-radius-10" id="fileupload">
                                    </div>
                                </div>
                            </div>
                        </div>                    
                        <div class="button-group">
                            <input type="button" value="Edit" id="btnEdit" class="btn btn-sm btn-warning">
                            <input type="button" value="Batal" id="btnBatal" class="btn btn-sm btn-danger m-r-5">
                            <input type="button" value="Simpan" id="btnSimpan" name="edit_pasien" class="btn btn-sm btn-success">
                        </div>
                    </form>
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
                                        <td>Tempat Lahir</td>
                                        <td>Tanggal Lahir</td>
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
                                            <td><?=$data['tempatLahir'];?></td>
                                            <td><?=$data['tanggalLahir'];?></td>
                                            <td><?=$data['nomorKTP'];?></td>
                                            <td><?=$data['noTelp'];?></td>
                                            <td><?=ucwords($data['type']);?></td>
                                            <td>                                            
                                                <button type='button' data-a="<?=$data['idOrtu'];?>" href='#editarUsuario' class='modalEditarUsuario btn btn-warning btn-sm' data-toggle="modal" data-target=".bd-example-modal-lg">
                                                    Edit
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
            <!-- Content Row -->            
        </div>
        <!-- modals -->
        <div id="editarUsuario" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                </div>
            </div>
        </div>
        <?php include '../assets/layout/footer.php'; ?>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <!-- Alert -->
    <script src="../assets/vendor/alertify/alertify.min.js"></script>
    <script>
        $('.modalEditarUsuario').click(function(){
            var idOrtu=$(this).attr('data-a');
            $.ajax({
                url:"php/editModal.php?id="+idOrtu,
                cache:false,
                success:function(result){
                    $(".modal-content").html(result);
                }
            });
        });
    </script>
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

        fileupload.onchange = evt => {
            let foto = document.getElementById('fileupload');
            let fotoSize=foto.files.item(0).size;
            let fotoName=foto.files.item(0).name;
            var patternFileExtension = /\.([0-9a-z]+)(?:[\?#]|$)/i;
            var fileType = (fotoName).match(patternFileExtension);
            let acceptFile = ['jpg', 'png', 'jpeg'];
            if (!acceptFile.includes(fileType[1])  ) {
                alertify.error('Tipe File Tidak Sesuai');
                foto.value='';
            }else if(fotoSize>=1572864){
                alertify.error('Ukuran File Terlalu Besar');
                foto.value='';
            }else{
                const [file] = fileupload.files
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
                }
            }
        }

        function cekSK(){
            let file = document.getElementById('skKepolisian');
            let fileSize=file.files.item(0).size;
            let fileName=file.files.item(0).name;
            let fileType = fileName.split(".");
            if (fileType[1]!='pdf') {
                alertify.error('Tipe File Tidak Sesuai');
                file.value='';
            } else if (fileSize>=1572864){
                alertify.error('Ukuran File Terlalu Besar');
                file.value='';
            }
        }

        $(document).ready(function() {            
            $('#btnBatal').hide();
            $('#btnSimpan').hide();
            $('#formEdit').hide();
            $('.idOrtu').hide();
            $('#btnEdit').click(function(){
                $('#btnBatal').show();
                $('#btnSimpan').show();
                $('#btnEdit').hide();
                $('#formEdit').show();
                $('#formView').hide();
            });            
            $('#btnBatal').click(function(){
                $('#btnBatal').hide();
                $('#btnSimpan').hide();
                $('#btnEdit').show();
                $('#formEdit').hide();
                $('#formView').show();
            });
            $('#btnSimpan').click(function(){
                
                var idPasien = $('#idPasien').val();
                var namaPasien = $('#namaPasien').val();
                var tempatLahir = $('#tempatLahir').val();
                var tanggalLahir = $('#tanggalLahir').val();
                var tanggalMasukPanti = $('#tanggalMasukPanti').val();
                var anakKe = $('#anakKe').val();
                var jenisKelamin = $('#jenisKelamin').val();
                var agamaPasien = $('#agamaPasien').val();
                var pendidikanTerakhir = $('#pendidikanTerakhir').val();
                var statusPerkawinan = $('#statusPerkawinan').val();
                var golonganDarah = $('#golonganDarah').val();
                var pekerjaanPasien = $('#pekerjaanPasien').val();
                var jumlahSaudara = $('#jumlahSaudara').val();
                var kelDekat = $('#kelDekat').val();
                var perform = '1';
                var img = $('#fileupload').val();                
                const fileupload = $('#fileupload').prop('files')[0];
                
                let dataPasien = new FormData();
                dataPasien.append('idPasien',idPasien);
                dataPasien.append('namaPasien',namaPasien);
                dataPasien.append('tempatLahir',tempatLahir);
                dataPasien.append('tanggalLahir',tanggalLahir);
                dataPasien.append('tanggalMasukPanti',tanggalMasukPanti);
                dataPasien.append('anakKe',anakKe);
                dataPasien.append('jenisKelamin',jenisKelamin);
                dataPasien.append('agamaPasien',agamaPasien);
                dataPasien.append('pendidikanTerakhir',pendidikanTerakhir);
                dataPasien.append('statusPerkawinan',statusPerkawinan);
                dataPasien.append('golonganDarah',golonganDarah);
                dataPasien.append('pekerjaanPasien',pekerjaanPasien);
                dataPasien.append('jumlahSaudara',jumlahSaudara);
                dataPasien.append('kelDekat',kelDekat);
                dataPasien.append('perform',perform);
                dataPasien.append('fileupload', fileupload);
                dataPasien.append('img', img);
                console.log(dataPasien);
                $.ajax({
                    type: 'POST',
                    url: "php/proses_pasien.php",
                    data: dataPasien,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response=='success') {
                            $('#editarUsuario').modal('hide');  
                            var msg = alertify.success('', 1.5, function(){ clearInterval(interval); 
                                location.reload();});
                            var interval = setInterval(function(){
                                msg.setContent('Data Berhasil Diubah');
                            },150);             
                            
                        } else {
                            alertify.set('notifier','delay', 1.5);
                            alertify.error('Data Gagal Diubah');
                        }
                    }
                });

            });

        });

    </script>
</body>
</html>