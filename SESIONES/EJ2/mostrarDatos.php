<?php
    $contador=$_COOKIE['contador'];
    $contador++;
    setcookie("contador",$contador);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Información y cerrar sesión</h1>
    <h6>Información de la sesión</h6>
    <?php?>
    <p>Variables guardadas hasta ahora:</p>
    <?php
        print $contador;
    ?>
    <h6>Eliminar variables y cerrar sesión</h6>
</body>
</html>