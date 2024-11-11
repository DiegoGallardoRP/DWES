<?php
    if(isset($_REQUEST['redireccionar'])){
        $url=$_REQUEST['url'];
        if(filter_var($url,FILTER_VALIDATE_URL)){
            header('location:'.$url);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <form action="1.php" method="post">
        <?php
            if(isset($_REQUEST['redireccionar'])){
                print '<p class="error">Introdujo dirección erronea</p>';
            }
        ?>
        <p>Introduzca una dirección de un sitio web
        (ej http://www.google.com): <input type="text" name="url"></p>      

        <input type="submit" name="redireccionar" value="Enviar">
    </form>
    
</body>
</html>