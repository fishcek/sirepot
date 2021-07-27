
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF | Sirepot</title>
</head>
<body>
    <?php
        if (isset($_GET['file'])) {
            $path='../../assets/user/doc/';
            $file=$_GET['file'];
            header("content-type:application/pdf");
            readfile($path.$file);
        }
    ?>
</body>
</html>