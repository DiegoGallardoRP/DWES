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
    <title>Menú</title>
</head>
<body>
    <h1>BASES DE DATOS BLOQUE 2</h1>
    <ul>
        <li><a href="anadirRegistro.php">Añadir registro</a></li>
        <li><a href="listado.php">Listado</a></li>
        <li><a href="borrarRegistro.php">Borrar</a></li>
        <li><a href="buscarRegistro.php">Buscar</a></li>
        <li><a href="modificarRegistros.php">Modificar</a></li>
        <li><a href="eliminarTodo.php">Borrar todo</a></li>
    </ul>
</body>
</html>