<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <form action="3.2.php" method="post">
    <?php
        if(isset($_GET['error'])){print '<p class="error">Introduzca un nombre</p>';}        
    ?>
    <p>Escriba su nombre: <input type="text" name="nombre"></p>
    <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>