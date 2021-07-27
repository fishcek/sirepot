<?php
    include 'koneksi.php';
    if (isset($_POST['edit_wali'])) {
        $idPasien=$_POST['idPasien'];
        $namaPasien = $_POST['namaPasien'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $tanggalMasukPanti = $_POST['tanggalMasukPanti'];
        
        //upload
        $query=mysqli_query($koneksi,"SELECT foto FROM tb_pasien WHERE idPasien='$idPasien'");
        $getData=mysqli_fetch_array($query);

        //foto
        $foto_path="../../assets/user/img/".$getData['foto'];
        $pathFoto="../../assets/user/img/";
        $foto_tmp=$_FILES['foto']['tmp_name'];
        if ($foto_tmp!='') {
            unlink($foto_path);
            move_uploaded_file($foto_tmp, $pathFoto.$getData['foto']);
            $fotoName=$getData['foto'];
        }else{
            $fotoName=$getData['foto'];
        }

        $ubahData=mysqli_query($koneksi, "UPDATE `tb_pasien` SET `namaPasien`='$namaPasien',`tempatLahir`='$tempatLahir',`tanggalLahir`='$tanggalLahir',`tanggalMasukPanti`='$tanggalMasukPanti',`foto`='$fotoName',`statAktif`='1' WHERE `idPasien`='$idPasien'");
        if ($ubahData) {
            ?>
                <script type="text/javascript">
                    window.location.assign('../infoData_pasien');
                </script>
            <?php
        } else {
            echo "Gagal";
        }
    }
 
    if (isset($_POST['perform'])) {
        $idOrtu = $_POST['idOrtu'];
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $agama = $_POST['agama'];
        $jk = $_POST['jk'];
        $pekerjaan = $_POST['pekerjaan'];
        $alamat = $_POST['alamat'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $nomorKTP = $_POST['nomorKTP'];
        $nomorHP = $_POST['nomorHP'];
        $perform = $_POST['perform'];

        $edit=mysqli_query($koneksi, "UPDATE `tb_ortu` SET `nama`='$nama',`umur`='$umur',`jk`='$jk',`agama`='$agama',`pekerjaan`='$pekerjaan',`alamat`='$alamat',`tempatLahir`='$tempatLahir',`tanggalLahir`='$tanggalLahir',`nomorKTP`='$nomorKTP',`noTelp`='$nomorHP' WHERE `idOrtu`='$idOrtu'");
        if ($edit) {
            exit('success');
        }else{
            exit('gagal');
        }
    }
    
?>