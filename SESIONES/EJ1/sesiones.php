<?php
    if(isset($_REQUEST['enviar'])){
        $usuario=$_REQUEST['nombre'];
        $clave=$_REQUEST['clave'];
        session_start();
        $_SESSION["sesion"]="usuario:$usuario, clave:$clave";
        header("location: sesionesb.php?usuario=$usuario&clave=$clave");
        exit;
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
    <form action="sesiones.php" method="post">
        <p>Introduzca nombre de usuario: <input type="text" name="nombre"></p>
        <p>Introduzca clave: <input type="text" name="clave"></p>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>