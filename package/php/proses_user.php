<?php
    include 'koneksi.php';
    if (isset($_POST['input_user'])) {
        
        $namaUser = $_POST['namaUser'];
        $username = strtolower($_POST['username']);
        $passEnks= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $level = $_POST['level'];
        $dateNow = date('Y-m-d');

        // createId
        $kode = date('d').date('m').date('y');
        $data = mysqli_query($koneksi,"Select * From tb_user");
        $numRow = mysqli_num_rows($data)+1;
        if ($numRow>99) {
            $row = $numRow;
        }elseif ($numRow>9&&$numRow<100) {
            $row = "0".$numRow;
        }else{
            $row = "00".$numRow;
        }

        if ($level=='Fo') {
            $kodeLevel='1';
        } else if ($level=='Peksos') {
            $kodeLevel='2';
        } else {
            $kodeLevel='0';
        }        
        $idUser="US".$kodeLevel.$kode.$row;

        $signUp=mysqli_query($koneksi, "INSERT INTO tb_user VALUES('$idUser','$namaUser','$email','$username','$passEnks','$level','$dateNow')");

        if ($signUp) {
            ?>
                <script type="text/javascript">
                    window.location.assign('../infoData_user');
                </script>
            <?php
        } else {
            echo "Gagal";
        }
        
        echo
        $idUser.'<br>'.
        $namaUser.'<br>'.
        $username.'<br>'.
        $passEnks.'<br>'.
        $email.'<br>'.
        $level
        ;
    }


    if (isset($_POST['edit_ot'])) {
        $kode=$_POST['kode'];

        $ambilUser=mysqli_query($koneksi, "Select password, level From tb_user Where kode='$kode'");
        $dataUser=mysqli_fetch_array($ambilUser);
        if ($_POST['password']=='') {
            $password= $dataUser['password'];
        }else{            
            $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        if ($_POST['level']=='0') {
            $level= $dataUser['level'];
        }else{            
            $level= $_POST['level'];
        }
        $namaUser = $_POST['namaUser'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        $updateUser=mysqli_query($koneksi, "UPDATE `tb_user` SET `kode`='$kode',`nama`='$namaUser',`email`='$email',`username`='$username',`password`='$password',`level`='$level' WHERE `kode`='$kode'");
        if ($updateUser) {
            ?>
                <script type="text/javascript">
                    window.location.assign('../infoData_user');
                </script>
            <?php
        } else {
            echo "Gagal";
        }
    }

    if (isset($_GET['proses'])) {
        $idUser=$_GET['id'];
        $deleteUser=mysqli_query($koneksi, "DELETE FROM tb_user WHERE `kode`='$idUser'");
        if ($deleteUser) {
            ?>
                <script type="text/javascript">
                    window.location.assign('../infoData_user');
                </script>
            <?php
        } else {
            echo "Gagal";
        }
    }
?>