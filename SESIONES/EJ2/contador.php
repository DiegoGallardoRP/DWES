<?php
    if(!isset($_COOKIE['contador'])){
        $contador=1;
        print $contador;
        $contador++;
        setcookie("contador",$contador);
    }else{
        $contador=$_COOKIE["contador"];
        print $contador;
        $contador++;
        setcookie("contador",$contador);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Número de páginas recorridas o recargadas: <?php
            print $contador;
        ?></p>
        <p>Recarga la página <a href="contador.php">aquí</a> El contador se incrementa en 1</p>
        <h6>Reinicia el contador</h6>
        <p></p>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <p>Otras páginas de la sesión:</p>
    <p>Página 2: <a>Insertar más variables</a></p>
    <p>Página 3: <a>Datos de la sesión</a></p>
</body>
</html>