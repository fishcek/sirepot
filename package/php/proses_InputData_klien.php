<?php
    if (($_POST['input_ot'])) {
        $namaOT = $_POST['namaOT'];
        $umur = $_POST['umur'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $masalah = $_POST['masalah'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $tanggal = $_POST['tanggal'];
        $skKepolisian = $_FILES["skKepolisian"]["name"];
        $foto = $_FILES["foto"]["name"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?=$namaOT;?><br>
        <?=$umur;?><br>
        <?=$jenisKelamin;?><br>
        <?=$masalah;?><br>
        <?=$asal;?><br>
        <?=$tujuan;?><br>
        <?=$tanggal;?><br>
        <?=$skKepolisian;?><br>
        <?=$foto;?><br>
</html>