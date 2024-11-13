<?php
    $contador=$_COOKIE['contador'];
    $contador++;
    setcookie("contador",$contador);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Recogemos aquí más datos, los cuales serán almacenador para toda la sesión</p>
    <p>Has recorrido o recargado <?php
        print $contador;
    ?> páginas hasta ahora</p>
    <form action="" method="post">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Ciudad: <input type="text" name="ciudad"></p>
        <p>E-mail: <input type="text" name="email"></p>
        <p>Teléfono: <input type="text" name="telefono"></p>
        <p>Signo del zodiaco: 
            <select>
                <option>
            </select>
        </p>
        <input type="submit"  name="enviar" value="Enviar">
    </form>
    <h6>Datos recogidos:</h6>
    <p>contar: <?php
        print $contador;
    ?></p>
    <p>Página 1: <a href="contador.php">Reiniciar contador o sesión</a></p>
    <p>Página 3: <a>Datos de la sesión</a></p>
</body>
</html>