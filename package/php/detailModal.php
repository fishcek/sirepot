<?php
    $id=$_GET['id'];
    include 'koneksi.php';
    $query=mysqli_query($koneksi,"SELECT * FROM tb_ortu WHERE idOrtu='$id'") or die(mysqli_error($koneksi));
    $dataOrtu=mysqli_fetch_array($query);
    $tglLahir = $dataOrtu['tanggalLahir'];
    switch ($dataOrtu['type']) {
        case 'wali':
            $readonly='readonly';
            break;
        
        default:
            $readonly='';
            break;
    }
    switch ($dataOrtu['jk']) {
        case 'L':
            $jenisKelamin="Laki-Laki";
            break;            
        default:
            $jenisKelamin="Perempuan";
            break;
    }
        
?>
<div class="modal-header">
    <h5 class="modal-title text-dark font-weight-bold" id="exampleModalLabel">Detail <?=ucwords($dataOrtu['type']);?></h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- <form action="php/proses_waliOrtu" id="formEditOrtu" name="formEditOrtu"> -->
    <div class="modal-body text-black">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <h6 class="font-weight-bold">Nama</h6>
                    <h6 class="text-dark p-l-10"><?=ucwords($dataOrtu['nama']);?></h6>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Umur</h6>
                    <h6 class="text-dark p-l-10"><?=$dataOrtu['umur'];?></h6>
                 </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Agama</h6>
                    <h6 class="text-dark p-l-10"><?=ucwords($dataOrtu['agama']);?></h6>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Jenis Kelamin</h6>
                    <h6 class="text-dark p-l-10"><?=ucwords($jenisKelamin);?></h6>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Pekerjaan</h6>
                    <h6 class="text-dark p-l-10"><?=$dataOrtu['pekerjaan'];?></h6>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <h6 class="font-weight-bold">Alamat</h6>
                    <h6 class="text-dark p-l-10"><?=$dataOrtu['alamat'];?></h6>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Tempat Lahir</h6>
                    <h6 class="text-dark p-l-10"><?=$dataOrtu['tempatLahir'];?></h6>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Tanggal Lahir</h6>
                    <h6 class="text-dark p-l-10"><?=$tglLahir;?></h6>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Nomor KTP</h6>
                    <h6 class="text-dark p-l-10"><?=$dataOrtu['nomorKTP'];?></h6>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Nomor HP</h6>
                    <h6 class="text-dark p-l-10"><?=$dataOrtu['noTelp'];?></h6>
                </div>
            </div>
        </div>
    </div>
<!-- </form> -->