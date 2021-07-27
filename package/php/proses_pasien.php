<?php
    include 'koneksi.php';
    if (isset($_POST['input_pernyataan'])) {
        //----tbPasien----//
        $namaAnak=$_POST['namaAnak'];
        $tempatLahirAnak=$_POST['tempatLahirAnak'];
        $tanggalLahirAnak=$_POST['tanggalLahirAnak'];
        $tanggalMasukPanti=$_POST['tanggalMasukPanti'];
        $anakPasien=$_POST['anakPasien'];
        $jenisKelaminPasien=$_POST['jenisKelaminPasien'];
        $agamaPasien=$_POST['agamaPasien'];
        $pendidikanPasien=$_POST['pendidikanPasien'];
        $statusPasien=$_POST['statusPasien'];
        $golPasien=$_POST['golPasien'];
        $kerjaanPasien=$_POST['kerjaanPasien'];
        $jmlSaudaraPasien=$_POST['jmlSaudaraPasien'];
        $kelDekatPasien=$_POST['kelDekatPasien'];

        // createId
        $tgl1=explode('-',$tanggalMasukPanti);
        $data = mysqli_query($koneksi,"Select idPasien From tb_pasien");
        $numRow = mysqli_num_rows($data)+1;      
        $idPasien="PS".$tgl1[2].$tgl1[1].$tgl1[0].$numRow;

        //foto
        $pathFoto="../../assets/user/img/";
        $foto_tmp=$_FILES['foto']['tmp_name'];
        $type=explode('.',$_FILES['foto']['name']);

        $fotoName=$idPasien.'.'.$type[1];
        move_uploaded_file($foto_tmp, $pathFoto.$fotoName);

        $queryPasien=mysqli_query($koneksi,"INSERT INTO tb_pasien VALUES ('$idPasien','$namaAnak','$tempatLahirAnak','$tanggalLahirAnak','$tanggalMasukPanti', '$anakPasien', '$jenisKelaminPasien', '$agamaPasien', '$pendidikanPasien', '$statusPasien', '$golPasien', '$kerjaanPasien', '$jmlSaudaraPasien', '$kelDekatPasien', '$fotoName', '1','') ") or die(mysqli_error($koneksi));
        
        //----tbOrtu----//
        switch ($_POST['tipeWali']) {
            case '2':
                $tipeWali='';
                $tipeIbu='ibu';
                $tipeAyah='wali';
                $loop=2;
                break;
            case '3':
                $tipeWali='';
                $tipeIbu='wali';
                $tipeAyah='ayah';
                $loop=2;
                break;
            default:
                $tipeWali='wali';
                $tipeIbu='ibu';
                $tipeAyah='ayah';
                $loop=3;
                break;
        }
        $ayah=$_POST['ayah'];
        $ayah1=$ayah[0];
        $ayah2=$ayah[1];
        $ayah3=substr($ayah[2],0,1);
        $ayah4=$ayah[3];
        $ayah5=$ayah[4];
        $ayah6=$ayah[5];
        $ayah7=$ayah[6];
        $ayah8=$ayah[7];
        $ayah9=$ayah[8];
        $ayah10=$ayah[9];
        $ibu=$_POST['ibu'];
        $ibu1=$ibu[0];
        $ibu2=$ibu[1];
        $ibu3=substr($ibu[2],0,1);
        $ibu4=$ibu[3];
        $ibu5=$ibu[4];
        $ibu6=$ibu[5];
        $ibu7=$ibu[6];
        $ibu8=$ibu[7];
        $ibu9=$ibu[8];
        $ibu10=$ibu[9];
        $data = mysqli_query($koneksi,"SELECT idOrtu FROM tb_ortu");
        $numRow = mysqli_num_rows($data)+1;
        $numRow1 = mysqli_num_rows($data)+2;
        $numRow2 = mysqli_num_rows($data)+3;      
        $idAyah="OR".date('d').date('m').date('y').$numRow;
        $idIbu="OR".date('d').date('m').date('y').$numRow1;
        $idWali="OR".date('d').date('m').date('y').$numRow2;
        
        if ($loop==2) {
            $query="INSERT INTO `tb_ortu` VALUES ('$idAyah','$ayah1','$ayah2','$ayah3','$ayah4','$ayah5','$ayah6','$ayah7','$ayah8','$ayah9','$ayah10','$tipeAyah','$idPasien'), ('$idIbu','$ibu1','$ibu2','$ibu3','$ibu4','$ibu5','$ibu6','$ibu7','$ibu8','$ibu9','$ibu10','$tipeIbu','$idPasien')";          
        }else{
            $wali=$_POST['wali'];
            $wali1=$wali[0];
            $wali2=$wali[1];
            $wali3=$wali[2];
            $wali4=$wali[3];
            $wali5=$wali[4];
            $wali6=$wali[5];
            $wali7=$wali[6];
            $wali8=$wali[7];
            $wali9=$wali[8];
            $wali10=$wali[9];
            $query="INSERT INTO `tb_ortu` VALUES ('$idAyah','$ayah1','$ayah2','$ayah3','$ayah4','$ayah5','$ayah6','$ayah7','$ayah8','$ayah9','$ayah10','$tipeAyah','$idPasien'), ('$idIbu','$ibu1','$ibu2','$ibu3','$ibu4','$ibu5','$ibu6','$ibu7','$ibu8','$ibu9','$ibu10','$tipeIbu','$idPasien'), ('$idWali','$wali1','$wali2','$wali3','$wali4','$wali5','$wali6','$wali7','$wali8','$wali9','$wali10','$tipeWali','$idPasien')";
            
        }
        $input = mysqli_query($koneksi,$query) or die( mysqli_error($koneksi));
        
        if ($queryPasien && $input) {
            header("location:../infoData_pasien.php");
        }else{
            echo "nai";
        }
    }

    if (isset($_POST['perform'])) {
        $idPasien=$_POST['idPasien'];

        $getFoto=mysqli_query($koneksi, "SELECT `foto` FROM tb_pasien WHERE `idPasien`='$idPasien'");
        $foto=mysqli_fetch_array($getFoto);
        $foto_path="../../assets/user/img/".$foto['foto'];
        $pathFoto="../../assets/user/img/";

        if ($_POST['img']=='') {
            $fotoUpload=$foto['foto'];
        }else{
            $fileupload = $_FILES['fileupload']['tmp_name'];
            $ImageName = $_FILES['fileupload']['name'];            
            $ext = pathinfo($ImageName, PATHINFO_EXTENSION);
            $fotoUpload = $idPasien.'.'.$ext;
            unlink($foto_path);
            move_uploaded_file($fileupload, $pathFoto.$fotoUpload);
        }

        $namaPasien=$_POST['namaPasien'];
        $tempatLahir=$_POST['tempatLahir'];
        $tanggalLahir=$_POST['tanggalLahir'];
        $tanggalMasukPanti=$_POST['tanggalMasukPanti'];
        $anakKe=$_POST['anakKe'];
        $jenisKelamin=$_POST['jenisKelamin'];
        $agamaPasien=$_POST['agamaPasien'];
        $pendidikanTerakhir=$_POST['pendidikanTerakhir'];
        $statusPerkawinan=$_POST['statusPerkawinan'];
        $golonganDarah=$_POST['golonganDarah'];
        $pekerjaanPasien=$_POST['pekerjaanPasien'];
        $jumlahSaudara=$_POST['jumlahSaudara'];
        $kelDekat=$_POST['kelDekat'];

        $update=mysqli_query($koneksi, "UPDATE `tb_pasien` SET `namaPasien`='$namaPasien',`tempatLahir`='$tempatLahir',`tanggalLahir`='$tanggalLahir',`tanggalMasukPanti`='$tanggalMasukPanti',`anak`='$anakKe',`jenisKelaminPasien`='$jenisKelamin',`agamaPasien`='$agamaPasien',`pendidikanPasien`='$pendidikanTerakhir',`statusPasien`='$statusPerkawinan',`golPasien`='$golonganDarah',`kerjaanPasien`='$pekerjaanPasien',`jmlSaudaraPasien`='$jumlahSaudara',`kelDekatPasien`='$kelDekat',`foto`='$fotoUpload' WHERE `idPasien`='$idPasien'");

        if ($update) {
            exit('success');
        }else{
            exit('gagal');
        }
    }

    if (isset($_POST['prosesEdit'])) {
        $idPasien=$_POST['idPasien'];
        $status=$_POST['status'];
        $updateStatus=mysqli_query($koneksi, "UPDATE tb_pasien SET `statAktif`='$status' WHERE `idPasien`='$idPasien'");
        if ($updateStatus) {
            exit('success');
        }else{
            exit('gagal');
        }
    }

    if (isset($_POST['prosesHapus'])) {
        $idPasien=$_POST['idPasien'];
        $getFoto=mysqli_query($koneksi, "SELECT `foto` FROM tb_pasien WHERE `idPasien`='$idPasien'");
        $foto=mysqli_fetch_array($getFoto);
        $foto_path="../../assets/user/img/".$foto['foto'];

        $deletePasien=mysqli_query($koneksi,"DELETE FROM `tb_pasien` WHERE `idPasien`='$idPasien'");
        $deleteOrtu=mysqli_query($koneksi,"DELETE FROM `tb_ortu` WHERE `idPasien`='$idPasien'");
        
        if ($deleteOrtu && $deletePasien) {            
            unlink($foto_path);
            exit('success');
        }else{
            exit('gagal');
        }
    }

?>