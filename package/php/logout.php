<?php
    session_start();
    if (isset($_SESSION['login'])) {
        
        if (session_destroy()) {
            exit('success');
        }else{
            exit('gagal');
        }
    }
?>


