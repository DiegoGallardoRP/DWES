<?php
    session_start();
    if(!isset($_SESSION['loggeado'])){
        header('location: login.php');
        exit;
    }
    try{
        $conexion=new PDO('mysql:host=localhost;charset=utf8','root','');
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $resultado=$conexion->query('DELETE DATABASE IF EXISTS ej3t2');
        if($resultado->rowCount()!=0){
            header('location: login.php');
            exit;
        }else{
            print 'ERROR';
        }

    }catch(Exception $e){
        print '<p>Error no se puede conectar con la BBDD por \n' . $e->getMessage() . '</p>';
    }
?>