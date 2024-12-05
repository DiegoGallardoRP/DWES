<?php
    session_start();
    if(!isset($_SESSION['loggeado'])){
        header('location: login.php');
        exit;
    }
    print '<ul><li><a href="opciones.php">Menú principal</a></li></ul>';
    if(isset($_REQUEST['error'])){
        print 'Esa persona ya existe';
    }else{
        $nombre=$_REQUEST['nombre'];
        $apellidos=$_REQUEST['apellidos'];
        $direccion=$_REQUEST['direccion'];
        $telefono=$_REQUEST['telefono'];
        print "Se ha agregado a la persona $nombre $apellidos con vivienda en $direccion y telefono $telefono";
    }
?>