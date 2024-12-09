<?php
    session_start();
    if(!isset($_SESSION['loggeado'])){
        header('location: login.php');
        exit;
    }

    try{
    $conexion=new PDO('mysql:host=localhost;dbname=ej2t2;charset=utf8','root','');

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conexion->query('USE ej2t2');
    if(isset($_REQUEST['enviar'])){
        if(isset($_REQUEST['borrar'])){
            $ids=$_REQUEST['borrar'];
            foreach($ids as $valor){
                $borrarRegistro=$conexion->prepare("DELETE FROM personas WHERE id=:id");
                $borrarRegistro->execute([":id"=>$valor]);
            }
        }else{
            $error1=true;
        }
    }
    $resultado=$conexion->prepare('SELECT * FROM personas');
    $resultado->setFetchMode(PDO::FETCH_ASSOC);
    $resultado->execute();
    print '<a href="opciones.php">Menú principal</a>';
    if($resultado->rowCount()==0){
        print '<p>No hay registros existentes</p>';
    }else{
        print '<form action="borrarRegistro.php">
        <table style="border: 2px solid black"><thead>
        <tr>
        <th style="border: 2px solid black">Borrar</th>
        <th style="border: 2px solid black">Nombre</th>
        <th style="border: 2px solid black">Apellidos</th>
        <th style="border: 2px solid black">Dirección</th>
        <th style="border: 2px solid black">Teléfono</th>
        </tr>
        </thead><tbody>';
        while($row=$resultado->fetch()){
            print "<tr>
            <td style='border: 2px solid black'><input type='checkbox' name='borrar[]' value='$row[id]'></td>
            <td style='border: 2px solid black'>$row[nombre]</td>
            <td style='border: 2px solid black'>$row[apellidos]</td>
            <td style='border: 2px solid black'>$row[direccion]</td>
            <td style='border: 2px solid black'>$row[telefono]</td>
            </tr>";
        }
        if(isset($error1)){
            print '<p style="color: red">No se ha seleccionado ningún registro</p>';
        }
        print '</tbody></table><input type="submit" name="enviar" value="Enviar"><input type="reset" value="Reiniciar formulario"></form>';
    }
    
    }catch(Exception $e){
        print '<p>Error no se puede conectar con la BBDD por \n'.$e->getMessage().'</p>';
    }
?>