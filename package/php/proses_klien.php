<?php
    if (isset($_POST['input_ot'])) {
        $namaOT = $_POST['namaOT'];
        $umur = $_POST['umur'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $masalah = $_POST['masalah'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $tanggal = $_POST['tanggal'];
        $skKepolisian = $_FILES["skKepolisian"]["name"];
        $foto = $_FILES["foto"]["name"];
        
        echo
        $namaOT.'<br>'.
        $umur.'<br>'.
        $jenisKelamin.'<br>'.
        $masalah.'<br>'.
        $asal.'<br>'.
        $tujuan.'<br>'.
        $tanggal.'<br>'.
        $skKepolisian.'<br>'.
        $foto;
    }

    if (isset($_GET['proses'])) {
        $proses=$_GET['proses'];
        $idKlien=$_GET['id'];
        echo $idKlien;
    }
    
    if (isset($_POST['edit_ot'])) {
        $idKlien=$_POST['idKlien'];
        $namaOT = $_POST['namaOT'];
        $umur = $_POST['umur'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $masalah = $_POST['masalah'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $tanggal = $_POST['tanggal'];
        $skKepolisian = $_FILES["skKepolisian"]["name"];
        $foto = $_FILES["foto"]["name"];
        
        echo 
        $idKlien.'<br>'.
        $namaOT.'<br>'.
        $umur.'<br>'.
        $jenisKelamin.'<br>'.
        $masalah.'<br>'.
        $asal.'<br>'.
        $tujuan.'<br>'.
        $tanggal.'<br>'.
        $skKepolisian.'<br>'.
        $foto;
    }
?>