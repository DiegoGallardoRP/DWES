<?php
    try{
        print '<a href="1.php">Volver al inicio</a>';
        $conexion=new PDO('mysql:host=localhost;dbname=ej1t2;charset=utf8','root','');

        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $conexion->query('USE ej1t2');

        if(isset($_REQUEST['enviar'])){
            if(isset($_REQUEST['id'])){
                $ids=$_REQUEST['id'];
                foreach($ids as $valor){
                    $conexion->query("DELETE FROM alumnos WHERE id=$valor");
                }
            }else{
                print '<p>NO HA SELECCIONADO NINGÚN REGISTRO</p>';
            }
        }

        $resultado=$conexion->prepare('SELECT * FROM alumnos');
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $resultado->execute();
        print '<p>Seleccione la fila que desee eliminar</p>
        <form action="1_BorrarRegistro.php" method="post">
        <table><thead>
        <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Ciudad</th>
        </tr>
        </thead><tbody>';
        while($fila=$resultado->fetch()){
            print "<tr>
            <td><input type='checkbox' name='id[]' value='$fila[id]'></td>
            <td>$fila[nombre]</td>
            <td>$fila[ciudad]</td>
            </tr>";
        }
        print '</tr></tbody></table>
        <p><input type="submit" name="enviar" value="Borrar registros"><input type="reset" value="Reiniciar el formulario"></p></form>';

    }catch(Exception $e){
        print '<p>Error no se puede conectar con la BBDD por \n'.$e->getMessage().'</p>';
    }
?>