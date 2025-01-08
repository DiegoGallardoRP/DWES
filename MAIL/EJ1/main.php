<?php
    if(isset($_REQUEST['enviar'])){
        $nombre=$_REQUEST['nombre'];
        $apellidos=$_REQUEST['apellidos'];
        $email=$_REQUEST['email'];
        $asunto=$_REQUEST['asunto'];
        $mensaje=$_REQUEST['mensaje'];

        //verificacion
        $patronNombre='/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/';
        $patronApellidos='/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/';
        $patronEmail='/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        if(!preg_match($patronNombre,$nombre)){
            $errorNombre=true;
        }
        if(!preg_match($patronApellidos,$apellidos)){
            $errorApellidos=true;
        }
        if(!preg_match($patronEmail,$email)){
            $errorEmail=true;
        }
        if($asunto==''){
            $errorAsunto=true;
        }
        if($mensaje==''){
            $errorMensaje=true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            border: 2px solid red;
            outline: none;
        }
    </style>
</head>
<body>
    <form action="main.php" method="post">
        <p>
            Nombre: 
            <input type='text' <?php
                if(isset($errorNombre)){
                    print 'class="error"';
                }
            ?> name="nombre">
        </p>
        <p>
            Apellidos: 
            <input type='text' <?php
                if(isset($errorApellidos)){
                    print 'class="error"';
                }
            ?> name="apellidos">
        </p>
        <p>
            Email: 
            <input type='text' <?php
                if(isset($errorEmail)){
                    print 'class="error"';
                }
            ?> name="email">
        </p>
        <p>
            Asunto: 
            <input type='text' <?php
                if(isset($errorAsunto)){
                    print 'class="error"';
                }
            ?> name="asunto">
        </p>
        <p>
            Mensaje: 
            <textarea <?php
                if(isset($errorMensaje)){
                    print 'class="error"';
                }
            ?> name="mensaje"></textarea>
        </p>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>
</html>
<?php
//Si no hay errores se mostrará la información y se enviará el correo
    if(isset($_REQUEST['enviar'])&&!isset($errorNombre)&&!isset($errorApellidos)&&!isset($errorEmail)&&!isset($errorAsunto)&&!isset($errorMensaje)){
        $separador = md5(uniqid(time()));
        $cabecera="From: Diegophp2025@gmail.com\r\n";
        // Creamos la cabecera del mensaje:
			$cabecera .= "MIME-Version: 1.0\r\n".
            "Content-Type: multipart/mixed; boundary=\"".$separador."\"\r\n\r\n";

            $mensajeUsuario = "Mensaje de: ".$nombre.PHP_EOL;
			$mensajeUsuario .= "EMail: ".$email.PHP_EOL;
			$mensajeUsuario .= $mensaje;
            $ok = mail($email, $asunto, $mensajeUsuario, $cabecera );

            if( $ok == true )
                echo "<p>El E-Mail ha sido enviado</p>";
            else
                echo "<p>ERROR al enviar el E-Mail</p>";

            echo "<p>Haz <a href='adjuntos_1.html'>click para volver al formulario</a></p>";
            print '<p>Nombre '.$nombre.'</p><p>Apellidos '.$apellidos.'</p><p>Email '.$email.'</p><p>Asunto '.$asunto.'</p><p>Mensaje '.$mensaje.'</p>'; 
    }

?>