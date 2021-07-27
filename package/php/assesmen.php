<?php
    include 'koneksi.php';
    if (isset($_POST['perform'])) {
        // Kelahiran
        $usiaKandungan = $_POST['dataKelahiran1'];
        $kontrolKandunganRutin = $_POST['dataKelahiran2'];
        $kontrolKandunganDokter = $_POST['dataKelahiran3'];
        $kontrolKandunganDukun = $_POST['dataKelahiran4'];
        $gizi = $_POST['dataKelahiran5'];
        $penyakit = $_POST['dataKelahiran6'];
        $kecelakaan = $_POST['dataKelahiran7'];
        $bantuanDokter = $_POST['dataKelahiran8'];
        $bantuanBidan = $_POST['dataKelahiran9'];
        $bantuanDukun = $_POST['dataKelahiran10'];
        $tanpaBantuan = $_POST['dataKelahiran11'];
        $beratBadan = $_POST['dataKelahiran12'];
        $panjangBadan = $_POST['dataKelahiran13'];
        $keadaanLahir = $_POST['dataKelahiran14'];
        $keadaanLahirVacum = $_POST['dataKelahiran15'];
        $keadaanLahirOperasi = $_POST['dataKelahiran16'];
        $imunisasi = $_POST['dataKelahiran17'];
        $penyakitStep = $_POST['dataKelahiran18'];
        $minumAsi = $_POST['dataKelahiran19'];
        $bantuanSusu = $_POST['dataKelahiran20'];
        $skorDataKelahiran = $_POST['skorDataKelahiran'];
        $kesimpulanDataKelahiran = $_POST['kesimpulanDataKelahiran'];
        $RekomendasiDataKelahiran = $_POST['RekomendasiDataKelahiran'];

        //Sosial
        $sosial1 = $_POST['sosial1'];
        $sosial2 = $_POST['sosial2'];
        $sosial3 = $_POST['sosial3'];
        $sosial4 = $_POST['sosial4'];
        $sosial5 = $_POST['sosial5'];
        $sosial6 = $_POST['sosial6'];
        $sosial7 = $_POST['sosial7'];
        $sosial8 = $_POST['sosial8'];
        $sosial9 = $_POST['sosial9'];
        $sosial10 = $_POST['sosial10'];
        $skorSosial = $_POST['skorSosial'];
        $kesimpulanSosial = $_POST['kesimpulanSosial'];
        $RekomendasiSosial = $_POST['RekomendasiSosial'];

        //spiritual
        $spiritual1 =$_POST['spiritual1']; 
        $spiritual2 =$_POST['spiritual2']; 
        $spiritual3 =$_POST['spiritual3']; 
        $spiritual4 =$_POST['spiritual4']; 
        $spiritual5 =$_POST['spiritual5']; 
        $spiritual6 =$_POST['spiritual6']; 
        $spiritual7 =$_POST['spiritual7']; 
        $spiritual8 =$_POST['spiritual8']; 
        $spiritual9 =$_POST['spiritual9']; 
        $spiritual10 =$_POST['spiritual10']; 
        $skorSpiritual =$_POST['skorSpiritual']; 
        $kesimpulanSpiritual =$_POST['kesimpulanSpiritual']; 
        $RekomendasiSpiritual =$_POST['RekomendasiSpiritual']; 
        
        //penglihatan
        $penglihatan1 = $_POST['penglihatan1'];
        $penglihatan2 = $_POST['penglihatan2'];
        $penglihatan3 = $_POST['penglihatan3'];
        $penglihatan4 = $_POST['penglihatan4'];
        $penglihatan5 = $_POST['penglihatan5'];
        $penglihatan6 = $_POST['penglihatan6'];
        $penglihatan7 = $_POST['penglihatan7'];
        $penglihatan8 = $_POST['penglihatan8'];
        $penglihatan9 = $_POST['penglihatan9'];
        $penglihatan10 = $_POST['penglihatan10'];
        $penglihatan11 = $_POST['penglihatan11'];
        $penglihatan12 = $_POST['penglihatan12'];
        $penglihatan13 = $_POST['penglihatan13'];
        $penglihatan14 = $_POST['penglihatan14'];
        $penglihatan15 = $_POST['penglihatan15'];
        $penglihatan16 = $_POST['penglihatan16'];
        $penglihatan17 = $_POST['penglihatan17'];
        $penglihatan18 = $_POST['penglihatan18'];
        $penglihatan19 = $_POST['penglihatan19'];
        $penglihatan20 = $_POST['penglihatan20'];
        $skorPenglihatan = $_POST['skorPenglihatan'];
        $kesimpulanPenglihatan = $_POST['kesimpulanPenglihatan'];
        $RekomendasiPenglihatan = $_POST['RekomendasiPenglihatan'];      
        
        // createIdAses
        $tgl = date('d').date('m').date('y');
        $data = mysqli_query($koneksi,"SELECT idAses FROM tb_asesmen");
        $numRow = mysqli_num_rows($data)+1;      
        $idAses="AS".$tgl.$numRow;
        
        
        $queryAses = mysqli_query($koneksi,"INSERT INTO `tb_asesmen` VALUES ('$idAses', '$usiaKandungan','$kontrolKandunganRutin','$kontrolKandunganDokter','$kontrolKandunganDukun','$gizi','$penyakit','$kecelakaan','$bantuanDokter','$bantuanBidan','$bantuanDukun','$tanpaBantuan','$beratBadan','$panjangBadan','$keadaanLahir','$keadaanLahirVacum','$keadaanLahirOperasi','$imunisasi','$penyakitStep','$minumAsi','$bantuanSusu','$skorDataKelahiran', '$kesimpulanDataKelahiran','$RekomendasiDataKelahiran','$sosial1','$sosial2','$sosial3','$sosial4','$sosial5','$sosial6','$sosial7','$sosial8','$sosial9','$sosial10','$skorSosial','$kesimpulanSosial','$RekomendasiSosial','$spiritual1','$spiritual2','$spiritual3','$spiritual4','$spiritual5','$spiritual6','$spiritual7','$spiritual8','$spiritual9','$spiritual10','$skorSpiritual','$kesimpulanSpiritual','$RekomendasiSpiritual','$penglihatan1','$penglihatan2','$penglihatan3','$penglihatan4','$penglihatan5','$penglihatan6','$penglihatan7','$penglihatan8','$penglihatan9','$penglihatan10','$penglihatan11','$penglihatan12','$penglihatan13','$penglihatan14','$penglihatan15','$penglihatan16','$penglihatan17','$penglihatan18','$penglihatan19','$penglihatan20','$skorPenglihatan','$kesimpulanPenglihatan','$RekomendasiPenglihatan')") or die(mysqli_error($koneksi));

        $idPasien=$_POST['idPasien'];
        $queryPasien=mysqli_query($koneksi,"UPDATE tb_pasien SET idAses='$idAses' WHERE idPasien='$idPasien'") or die(mysqli_error($koneksi));
        if ($queryPasien&&$queryAses) {
                exit('success');
        }else{
            exit('gagal');
        }
        // echo 
        // $usiaKandungan.'<br>'.
        // $kontrolKandunganRutin.'<br>'.
        // $kontrolKandunganDokter.'<br>'.
        // $kontrolKandunganDukun.'<br>'.
        // $gizi.'<br>'.
        // $penyakit.'<br>'.
        // $kecelakaan.'<br>'.
        // $bantuanDokter.'<br>'.
        // $bantuanBidan.'<br>'.
        // $bantuanDukun.'<br>'.
        // $tanpaBantuan.'<br>'.
        // $beratBadan.'<br>'.
        // $panjangBadan.'<br>'.
        // $keadaanLahir.'<br>'.
        // $keadaanLahirVacum.'<br>'.
        // $keadaanLahirOperasi.'<br>'.
        // $imunisasi.'<br>'.
        // $penyakitStep.'<br>'.
        // $minumAsi.'<br>'.
        // $bantuanSusu.'<br>'.
        // $kesimpulanDataKelahiran.'<br>'.
        // $RekomendasiDataKelahiran.'<br><br>'.
    
        // $sosial1.'<br>'.
        // $sosial2.'<br>'.
        // $sosial3.'<br>'.
        // $sosial4.'<br>'.
        // $sosial5.'<br>'.
        // $sosial6.'<br>'.
        // $sosial7.'<br>'.
        // $sosial8.'<br>'.
        // $sosial9.'<br>'.
        // $sosial10.'<br>'.
        // $skorSosial.'<br>'.
        // $kesimpulanSosial.'<br>'.
        // $RekomendasiSosial.'<br><br>'.
    
        // $spiritual1.'<br>'.
        // $spiritual2.'<br>'.
        // $spiritual3.'<br>'.
        // $spiritual4.'<br>'.
        // $spiritual5.'<br>'.
        // $spiritual6.'<br>'.
        // $spiritual7.'<br>'.
        // $spiritual8.'<br>'.
        // $spiritual9.'<br>'.
        // $spiritual10.'<br>'.
        // $kesimpulanSpiritual.'<br>'.
        // $RekomendasiSpiritual.'<br><br>'.
    
        // $penglihatan1.'<br>'.
        // $penglihatan2.'<br>'.
        // $penglihatan3.'<br>'.
        // $penglihatan4.'<br>'.
        // $penglihatan5.'<br>'.
        // $penglihatan6.'<br>'.
        // $penglihatan7.'<br>'.
        // $penglihatan8.'<br>'.
        // $penglihatan9.'<br>'.
        // $penglihatan10.'<br>'.
        // $penglihatan11.'<br>'.
        // $penglihatan12.'<br>'.
        // $penglihatan13.'<br>'.
        // $penglihatan14.'<br>'.
        // $penglihatan15.'<br>'.
        // $penglihatan16.'<br>'.
        // $penglihatan17.'<br>'.
        // $penglihatan18.'<br>'.
        // $penglihatan19.'<br>'.
        // $penglihatan20.'<br>'.
        // $kesimpulanPenglihatan.'<br>'.
        // $RekomendasiPenglihatan
        // ;
    }
?>