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

        $id=$_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];

        if($nombre!=""){
            $resultado=$conexion->prepare('UPDATE personas SET nombre=:nombre WHERE id=:id');
            $resultado->execute([":nombre"=>$nombre,":id"=>$id]);
        }
        if($apellidos!=""){
            $resultado=$conexion->prepare('UPDATE personas SET apellidos=:apellidos WHERE id=:id');
            $resultado->execute([":apellidos"=>$apellidos,":id"=>$id]);
        }
        if($direccion!=""){
            $resultado=$conexion->prepare('UPDATE personas SET direccion=:direccion WHERE id=:id');
            $resultado->execute([":direccion"=>$direccion,":id"=>$id]);
        }
        if($telefono!=""){
            $resultado=$conexion->prepare('UPDATE personas SET telefono=:telefono WHERE id=:id');
            $resultado->execute([":telefono"=>$telefono,":id"=>$id]);
        }
        
        if($resultado->rowCount()!=0){
            print 'Se ha modificado el usuario con id'.$id.'';
        }else{
            print 'Valores vacíos';
        }

    } catch (Exception $e) {
        print '<p>Error no se puede conectar con la BBDD por \n' . $e->getMessage() . '</p>';
    }
}
?>