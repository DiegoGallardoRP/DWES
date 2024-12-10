<?php
session_start();
if (!isset($_SESSION['loggeado'])) {
    header('location: login.php');
    exit;
}

if (isset($_REQUEST['enviar'])) {
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=ej3t2;charset=utf8', 'root', '');

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        //Usar UPDATE
        $resultado = $conexion->prepare('UPDATE personas SET nombre=:nombre,apellidos=:apellidos,direccion=:direccion,telefono=:telefono WHERE id=:id');
    } catch (Exception $e) {
        print '<p>Error no se puede conectar con la BBDD por \n' . $e->getMessage() . '</p>';
    }
}
if (isset($_REQUEST['error'])) {

}
?>