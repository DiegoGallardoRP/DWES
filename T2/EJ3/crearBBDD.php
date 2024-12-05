<?php
    session_start();
    if(!isset($_SESSION['loggeado'])){
        header('location: login.php');
        exit;
    }
    //Tras loggearse se creará la base de datos para que esté ya creada si no lo está
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=ej3t2;charset=utf8','root','');

        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $conexion->query('CREATE DATABASE IF NOT EXISTS ej3t2');
        $conexion->query('CREATE TABLE IF NOT EXISTS personas(id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(15) NOT NULL,
                    apellidos VARCHAR(25) NOT NULL,direccion VARCHAR(25) NOT NULL,telefono INT NOT NULL)');

        header('location: opciones.php');
    }catch(Exception $e){
        print '<p>Error no se puede conectar con la BBDD por \n'.$e->getMessage().'</p>';
    }
?>