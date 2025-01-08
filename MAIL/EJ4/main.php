<?php
   if(isset($_REQUEST['enviar'])){
    $nombre=htmlspecialchars(trim($_REQUEST['nombre']), ENT_QUOTES, 'UTF-8');
    $email=htmlspecialchars(trim($_REQUEST['email']), ENT_QUOTES, 'UTF-8');
    $mensaje=htmlspecialchars(trim($_REQUEST['mensaje']), ENT_QUOTES, 'UTF-8');

    //verificacion
    $patronNombre='/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/';
    $patronEmail='/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    if(!preg_match($patronNombre,$nombre)){
        $errorNombre=true;
    }
    if(!preg_match($patronEmail,$email)){
        $errorEmail=true;
    }
    if($mensaje==''){
        $errorMensaje=true;
    }
}
// Si no hay errores, se enviará el correo
if (isset($_REQUEST['enviar'])&&!isset($errorNombre) && !isset($errorEmail) && !isset($errorMensaje)) {
    $cabecera = "From: Diegophp2025@gmail.com\r\n";
    $mensajeUsuario="";
    if(empty($_FILES['txtFile']['name'])==false){
        $separador=md5(uniqid(time()));

        if(is_uploaded_file($_FILES['txtFile']['tmp_name'])){
            $archivo=fopen($_FILES['txtFile']['tmp_name'],"rb");
            $datos = fread( $archivo, filesize($_FILES['txtFile']['tmp_name']) );
            fclose($archivo);

            $datos = chunk_split( base64_encode($datos) );
        }

        
        $cabecera .= "MIME-Version: 1.0\r\n";
        $cabecera .= "Content-Type: multipart/mixed; boundary=\"".$separador."\"\r\n\r\n";

        $mensajeUsuario="--".$separador."\r\n";
        $mensajeUsuario.="Content-Type:text/plain; charset='iso-8859-1'\r\n";
        $mensajeUsuario.="Content-Transfer-Encoding: 7bit\r\n\r\n";
        $mensajeUsuario.=$_REQUEST['mensaje']."\r\n\r\n";

        $mensajeUsuario.="--".$separador."\r\n";
        $mensajeUsuario.="Content-Type: ".$_FILES['txtFile']['type']."; name='".$_FILES['txtFile']['name']."'\r\n";
        $mensajeUsuario.="Content-Transfer-Encoding: base64\r\n";
        $mensajeUsuario.="Content-Disposition: attachment; filename='".$_FILES['txtFile']['name']."'\r\n\r\n";
        $mensajeUsuario.=$datos."\r\n\r\n";

        $mensajeUsuario.="--".$separador."--";
    }else{
        $mensajeUsuario="Email: ".$_REQUEST['email'].PHP_EOL;
        $mensajeUsuario.=$_REQUEST['mensaje'];
    }
    

    $ok = mail($email, "Mensaje nuevo", $mensajeUsuario, $cabecera);

    if ($ok) {
        echo "<p>El E-Mail ha sido enviado exitosamente.</p>";
    } else {
        echo "<p>Error al enviar el E-Mail. Redirigiendo en 5 segundos...</p>";
        header("Refresh:5; url=main.php");
    }

    echo "<p>Haz <a href='main.php'>click aquí para volver al formulario</a></p>";
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='main.php' method='post'>
    <p>Nombre del remitente: <input type='text'<?php
                if(isset($errorNombre)){
                    print 'class="error"';
                }
            ?> name="nombre"></p>
    <p>Email destinatario: <input type='text' <?php
                if(isset($errorEmail)){
                    print 'class="error"';
                }
            ?> name="email"></p>
    <p>Mensaje:<textarea <?php
                if(isset($errorMensaje)){
                    print 'class="error"';
                }
            ?> name="mensaje"></textarea></p>
    <p>Archivo adjunto: <input type="file" name="txtFile"></p>
    <p><input type='submit' name="enviar" value="Enviar"></p>
    </form>
</body>
</html>
<?php
    }
?>