<?php
    session_start();
    if(!isset($_SESSION['loggeado'])){
        header('location: login.php');
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
    <h1>BASES DE DATOS BLOQUE 2</h1>
    <ul>
        <li><a href="insertar.php">Insertar registro</a></li>
        <li><a href="listado.php">Listado</a></li>
        <li><a href="borrarRegistro.php">Borrar registros</a></li>
    </ul>
</body>
</html>