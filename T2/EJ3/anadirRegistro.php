<?php
    session_start();
    if(!isset($_SESSION['loggeado'])){
        header('location: login.php');
        exit;
    }

    try{
        if(isset($_REQUEST['enviar'])){
            $nombre=htmlspecialchars(trim(strip_tags($_REQUEST['nombre'])),ENT_QUOTES,'UTF-8');
            $apellidos=htmlspecialchars(trim(strip_tags($_REQUEST['apellidos'])),ENT_QUOTES,'UTF-8');
            $direccion=htmlspecialchars(trim(strip_tags($_REQUEST['direccion'])),ENT_QUOTES,'UTF-8');
            $telefono=htmlspecialchars(trim(strip_tags($_REQUEST['telefono'])),ENT_QUOTES,'UTF-8');

            $patron_nombre = '/^[A-Za-záÁéÉíÍóÓúÚñÑ]{1,15}$/';
            $patron_apellidos = '/^[A-Za-záÁéÉíÍóÓúÚñÑ\s]{1,25}$/';
            $patron_direccion = '/^[A-Za-záÁéÉíÍóÓúÚñÑ\s]{1,25}$/';
            $patron_telefono='/^[0-9]{9}$/';

            if($nombre!=''&&$apellidos!=''&&preg_match($patron_nombre,$nombre)&&preg_match($patron_apellidos,$apellidos)){
                $resultado=$conexion->prepare("SELECT * FROM personas WHERE nombre=:nombre AND apellidos=:apellidos AND direccion=:direccion AND telefono=:telefono");
                $resultado->execute([":nombre"=>$nombre, ":apellidos"=>$apellidos, ":direccion"=>$direccion, ":telefono"=>$telefono]);
                if($resultado->rowCount()==0){
                    $anadirPersona=$conexion->prepare("INSERT INTO personas(nombre, apellidos,direccion,telefono) values(:nombre,:apellidos,:direccion,:telefono)");
                    $anadirPersona->execute([":nombre"=>$nombre, ":apellidos"=>$apellidos, ":direccion"=>$direccion, ":telefono"=>$telefono]);
                    header('location: anadir2.php?nombre='.$nombre.'&apellidos='.$apellidos.'&direccion='.$direccion.'&telefono='.$telefono);
                    exit;
                }else{
                    header('location: anadir2.php?error=1');
                    exit;
                }
            }else{
                $error=1;
            }
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
    <form action="anadirRegistro.php" method="post">
        <p> Nombre: <input type="text" name="nombre"></p>
        <p> Apellidos: <input type="text" name="apellidos"></p>
        <p> Dirección: <input type="text" name="direccion"></p>
        <p> Teléfono: <input type="text" name="telefono"></p>
        <?php
            if(isset($error)){
                print '<p style="color: red">datos erróneos</p>';
            }
        ?>
        <p><input type="submit" name="enviar" value="Enviar">
        <input type="reset" value="Resetear"></p>
    </form>
</body>
</html>
<?php
    }catch(Exception $e){
        print '<p>Error no se puede conectar con la BBDD por \n'.$e->getMessage().'</p>';
    }
?>