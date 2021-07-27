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
            $selectedL='selected';
            $selectedP='';
            break;            
        default:
            $selectedL='';
            $selectedP='selected';
            break;
    }
    switch ($dataOrtu['agama']) {
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
        
?>
<div class="modal-header">
    <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Data <?=ucwords($dataOrtu['type']);?></h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- <form action="php/proses_waliOrtu" id="formEditOrtu" name="formEditOrtu"> -->
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" class="form-control border-radius-5" name="idOrtu" id="idOrtu" value="<?=$id;?>">
                    <input type="text" class="form-control border-radius-5" name="nama" id="nama" value="<?=$dataOrtu['nama'];?>">
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Umur</label>
                            <input type="text" class="form-control border-radius-5" name="umur" id="umur" value="<?=$dataOrtu['umur'];?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Agama</label>
                            <select name='agama' class="form-control border-radius-5" id="agama">
                                <option value='islam' <?=$selectedIslam;?>>Islam</option>
                                <option value='kristen' <?=$selectedKristen;?>>Kristen</option>
                                <option value='katholik' <?=$selectedKhatolik;?>>Katholik</option>
                                <option value='hindu' <?=$selectedHindu;?>>Hindu</option>
                                <option value='kristen' <?=$selectedBudha;?>>Budha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control border-radius-5" name="jk" id="jk" <?=$readonly;?>>
                                <option value="L" <?=$selectedL;?>>Laki-Laki</option>
                                <option value="P" <?=$selectedP;?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control border-radius-5" id="pekerjaan" name="pekerjaan" id="nama"  value="<?=$dataOrtu['pekerjaan'];?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control border-radius-5" name="alamat" id="alamat"  value="<?=$dataOrtu['alamat'];?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control border-radius-5" name="tempatLahir" id="tempatLahirOrtu"  value="<?=$dataOrtu['tempatLahir'];?>">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control border-radius-5" name="tanggalLahir" id="tanggalLahirOrtu" value="<?=$tglLahir;?>">
                </div>
                <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="number" min="0" class="form-control border-radius-5" name="nomorKTP" id="nomorKTP"  value="<?=$dataOrtu['nomorKTP'];?>">
                </div>
                <div class="form-group">
                    <label>Nomor HP</label>
                    <input type="number" min="0" class="form-control border-radius-5" name="nomorHP" id="nomorHP"  value="<?=$dataOrtu['noTelp'];?>">
                </div>
            </div>
        </div>
        <?php 
            $valueA = $id;
        ?>
    </div>
    <div class="modal-footer">
        <button type="submit" id="editOrtu" class="btn btn-primary btn-sm" value="submit">
        Simpan</button>
        <button type="reset" id="cancelar" class="btn btn-danger btn-sm" data-dismiss="modal" value="reset">
        Batal</button>
    </div>
    <script>
        $('#editOrtu').click(function (){
            var data = {
                idOrtu:$('#idOrtu').val(),
                nama:$('#nama').val(),
                umur:$('#umur').val(),
                agama:$('#agama').val(),
                jk:$('#jk').val(),
                pekerjaan:$('#pekerjaan').val(),
                alamat:$('#alamat').val(),
                tempatLahir:$('#tempatLahirOrtu').val(),
                tanggalLahir:$('#tanggalLahirOrtu').val(),
                nomorKTP:$('#nomorKTP').val(),
                nomorHP:$('#nomorHP').val(),
                perform:'edit'
            }
            $.ajax({
            type:'POST',
            url:'php/proses_waliOrtu.php',
            data:data,
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
            },
            dataType:'text'
          });
        });
    </script>
<!-- </form> -->