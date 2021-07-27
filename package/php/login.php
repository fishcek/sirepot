<?php
     if (isset($_POST['perform'])) {
        include 'koneksi.php';
        $username		= $_POST['username'];
        $password		= $_POST['password'];

        $login = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username ='$username'");
        $userPassword = mysqli_fetch_assoc($login);
        if (password_verify($password, $userPassword['password'])){	
            switch ($userPassword['level']) {
                case 'Fo':
                    $level='Front Office';
                    break;
                case 'Peksos':
                    $level='Pekerja Sosial';
                    break;
                case 'Adm':
                    $level='Admin';
                    break;
                default:
                    $level='*';
                    break;
            }	
            $token=getToken();
            $dataSession=[$token, $userPassword['nama'], $level, $userPassword['level']];
            session_start();
            $_SESSION["login"] = $dataSession;
			exit('success');
		}else{
            exit('gagal');
        }
     }
     function getToken(){               
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $token = '';
        for ($i = 0; $i < 40; $i++) {
            $token .= $characters[rand(0, $charactersLength - 1)];
        } 
        return $token;
    }
?>

