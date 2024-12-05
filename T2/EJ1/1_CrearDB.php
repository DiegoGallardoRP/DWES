<?php
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=ej1t2;charset=utf8','root','');

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conexion->query('DROP DATABASE IF EXISTS ej1t2');
        $conexion->query('CREATE DATABASE ej1t2');
        $conexion->query('USE ej1t2');
        $conexion->query('CREATE TABLE alumnos(
        id int not null primary key,
        nombre varchar(10) not null,
        ciudad varchar(20) not null)');

        $conexion->query('INSERT INTO alumnos(id, nombre, ciudad) VALUES (27, "Juan", "Móstoles")');
        $conexion->query('INSERT INTO alumnos(id, nombre, ciudad) VALUES (28, "María", "Villaviciosa")');

        $resultado=$conexion->prepare('SELECT * FROM alumnos');
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $resultado->execute();
        print '<a href="1.php">Volver al inicio</a>
        <table><thead>
        <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Ciudad</th>
        </tr>
        </thead><tbody>';
        while($row=$resultado->fetch()){
            print "<tr>
            <td>$row[id]</td>
            <td>$row[nombre]</td>
            <td>$row[ciudad]</td>
            </tr>";
        }
        print '</tr></tbody></table>';

    }catch(Exception $e){
        print '<p>Error no se puede conectar con la BBDD por \n'.$e->getMessage().'</p>';
    }
?>