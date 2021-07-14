<?php
    if (isset($_POST['simpan'])) {

        // biodata
        $namaAyah = $_POST['namaAyah'];
        $umurAyah = $_POST['umurAyah'];
        $jenisKelaminAyah = $_POST['jenisKelaminAyah'];
        $agamaAyah = $_POST['agamaAyah'];
        $kerjaanAyah = $_POST['kerjaanAyah'];
        $alamatAyah = $_POST['alamatAyah'];
        $namaIbu = $_POST['namaIbu'];
        $umurIbu = $_POST['umurIbu'];
        $jenisKelaminIbu = $_POST['jenisKelaminIbu'];
        $agamaIbu = $_POST['agamaIbu'];
        $kerjaanIbu = $_POST['kerjaanIbu'];
        $alamatIbu = $_POST['alamatIbu'];
        $namaPasien = $_POST['namaPasien'];
        $ttlPasien = $_POST['ttlPasien'];
        $anakPasien = $_POST['anakPasien'];
        $jenisKelaminPasien = $_POST['jenisKelaminPasien'];
        $agamaPasien = $_POST['agamaPasien'];
        $pendidikanPasien = $_POST['pendidikanPasien'];
        $statusPasien = $_POST['statusPasien'];
        $golPasien = $_POST['golPasien'];
        $kerjaanPasien = $_POST['kerjaanPasien'];
        $jmlSaudaraPasien = $_POST['jmlSaudaraPasien'];
        $kelDekatPasien = $_POST['kelDekatPasien'];

        // Kelahiran
        $usiaKandungan = $_POST['usiaKandungan'];
        $kontrolKandunganRutin = $_POST['kontrolKandunganRutin'];
        $kontrolKandunganDokter = $_POST['kontrolKandunganDokter'];
        $kontrolKandunganDukun = $_POST['kontrolKandunganDukun'];
        $gizi = $_POST['gizi'];
        $penyakit = $_POST['penyakit'];
        $kecelakaan = $_POST['kecelakaan'];
        $bantuanDokter = $_POST['bantuanDokter'];
        $bantuanBidan = $_POST['bantuanBidan'];
        $bantuanDukun = $_POST['bantuanDukun'];
        $tanpaBantuan = $_POST['tanpaBantuan'];
        $beratBadan = $_POST['beratBadan'];
        $panjangBadan = $_POST['panjangBadan'];
        $keadaanLahir = $_POST['keadaanLahir'];
        $keadaanLahirVacum = $_POST['keadaanLahirVacum'];
        $keadaanLahirOperasi = $_POST['keadaanLahirOperasi'];
        $imunisasi = $_POST['imunisasi'];
        $penyakitStep = $_POST['penyakitStep'];
        $minumAsi = $_POST['minumAsi'];
        $bantuanSusu = $_POST['bantuanSusu'];
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
        $kesimpulanPenglihatan = $_POST['kesimpulanPenglihatan'];
        $RekomendasiPenglihatan = $_POST['RekomendasiPenglihatan'];

        echo 
        $namaAyah.'<br>'.
        $umurAyah.'<br>'.
        $jenisKelaminAyah.'<br>'.
        $agamaAyah.'<br>'.
        $kerjaanAyah.'<br>'.
        $alamatAyah.'<br>'.
        $namaIbu.'<br>'.
        $umurIbu.'<br>'.
        $jenisKelaminIbu.'<br>'.
        $agamaIbu.'<br>'.
        $kerjaanIbu.'<br>'.
        $alamatIbu.'<br>'.
        $namaPasien.'<br>'.
        $ttlPasien.'<br>'.
        $anakPasien.'<br>'.
        $jenisKelaminPasien.'<br>'.
        $agamaPasien.'<br>'.
        $pendidikanPasien.'<br>'.
        $statusPasien.'<br>'.
        $golPasien.'<br>'.
        $kerjaanPasien.'<br>'.
        $jmlSaudaraPasien.'<br>'.
        $kelDekatPasien.'<br><br>'.

        $usiaKandungan.'<br>'.
        $kontrolKandunganRutin.'<br>'.
        $kontrolKandunganDokter.'<br>'.
        $kontrolKandunganDukun.'<br>'.
        $gizi.'<br>'.
        $penyakit.'<br>'.
        $kecelakaan.'<br>'.
        $bantuanDokter.'<br>'.
        $bantuanBidan.'<br>'.
        $bantuanDukun.'<br>'.
        $tanpaBantuan.'<br>'.
        $beratBadan.'<br>'.
        $panjangBadan.'<br>'.
        $keadaanLahir.'<br>'.
        $keadaanLahirVacum.'<br>'.
        $keadaanLahirOperasi.'<br>'.
        $imunisasi.'<br>'.
        $penyakitStep.'<br>'.
        $minumAsi.'<br>'.
        $bantuanSusu.'<br>'.
        $kesimpulanDataKelahiran.'<br>'.
        $RekomendasiDataKelahiran.'<br><br>'.

        $sosial1.'<br>'.
        $sosial2.'<br>'.
        $sosial3.'<br>'.
        $sosial4.'<br>'.
        $sosial5.'<br>'.
        $sosial6.'<br>'.
        $sosial7.'<br>'.
        $sosial8.'<br>'.
        $sosial9.'<br>'.
        $sosial10.'<br>'.
        $skorSosial.'<br>'.
        $kesimpulanSosial.'<br>'.
        $RekomendasiSosial.'<br><br>'.

        $spiritual1.'<br>'.
        $spiritual2.'<br>'.
        $spiritual3.'<br>'.
        $spiritual4.'<br>'.
        $spiritual5.'<br>'.
        $spiritual6.'<br>'.
        $spiritual7.'<br>'.
        $spiritual8.'<br>'.
        $spiritual9.'<br>'.
        $spiritual10.'<br>'.
        $kesimpulanSpiritual.'<br>'.
        $RekomendasiSpiritual.'<br><br>'.

        $penglihatan1.'<br>'.
        $penglihatan2.'<br>'.
        $penglihatan3.'<br>'.
        $penglihatan4.'<br>'.
        $penglihatan5.'<br>'.
        $penglihatan6.'<br>'.
        $penglihatan7.'<br>'.
        $penglihatan8.'<br>'.
        $penglihatan9.'<br>'.
        $penglihatan10.'<br>'.
        $penglihatan11.'<br>'.
        $penglihatan12.'<br>'.
        $penglihatan13.'<br>'.
        $penglihatan14.'<br>'.
        $penglihatan15.'<br>'.
        $penglihatan16.'<br>'.
        $penglihatan17.'<br>'.
        $penglihatan18.'<br>'.
        $penglihatan19.'<br>'.
        $penglihatan20.'<br>'.
        $kesimpulanPenglihatan.'<br>'.
        $RekomendasiPenglihatan
        ;
    }
?>