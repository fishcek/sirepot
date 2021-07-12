<?php
    if (isset($_POST['masuk'])) {
        session_start();
        $username		= $_POST['username'];
	    $password		= $_POST['password'];

        $_SESSION["login"] = 'ok';

        ?>
			 <script type="text/javascript">
				window.location.assign('../home');
			</script>
		<?php
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
    <?=$username;?>
    <?=$password;?>
</body>
</html>

