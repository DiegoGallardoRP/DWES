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
        $cabecera .= "MIME-Version: 1.0\r\n";
        $cabecera .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $ok = mail($email, "Mensaje nuevo", $mensaje, $cabecera);

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
        <p>Nombre: <input type='text' <?php
                if(isset($errorNombre)){
                    print 'class="error"';
                }
            ?> name="nombre"></p>
        <p>Email: <input type='text' <?php
                if(isset($errorEmail)){
                    print 'class="error"';
                }
            ?> name="email"></p>
        <p>Mensaje: <textarea <?php
                if(isset($errorMensaje)){
                    print 'class="error"';
                }
            ?> name="mensaje"></textarea></p>
        <p><input type='submit' value='Enviar' name='enviar'></p>
    </form>
</body>
</html>

<?php    
    }
?>