<?php
    if (isset($_POST['input_ot'])) {
        $namaUser = $_POST['namaUser'];
        $password = $_POST['password'];
        $passEnks= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $kode = $_POST['kode'];
        $email = $_POST['email'];
        $level = $_POST['level'];
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
        <?=$namaUser;?><br>
        <?=$password;?><br>
        <?=$passEnks;?><br>
        <?=$kode;?><br>
        <?=$email;?><br>
        <?=$level;?><br>
</html>