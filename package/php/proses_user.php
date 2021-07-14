<?php
    if (isset($_POST['input_ot'])) {
        $namaUser = $_POST['namaUser'];
        $password = $_POST['password'];
        $passEnks= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $kode = $_POST['kode'];
        $email = $_POST['email'];
        $level = $_POST['level'];

        echo
        $namaUser.'<br>'.
        $password.'<br>'.
        $passEnks.'<br>'.
        $kode.'<br>'.
        $email.'<br>'.
        $level
        ;
    }

    if (isset($_POST['edit_ot'])) {
        $idUser=$_POST['idUser'];
        $namaUser = $_POST['namaUser'];
        $password = $_POST['password'];
        $passEnks= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $kode = $_POST['kode'];
        $email = $_POST['email'];
        $level = $_POST['level'];

        echo
        $idUser.'<br>'.
        $namaUser.'<br>'.
        $password.'<br>'.
        $passEnks.'<br>'.
        $kode.'<br>'.
        $email.'<br>'.
        $level
        ;
    }

    if (isset($_GET['proses'])) {
        $proses=$_GET['proses'];
        $idKlien=$_GET['id'];
        echo $idKlien;
    }
?>