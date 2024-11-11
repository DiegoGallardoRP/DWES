
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
    <form action="2.2.php" method="post">
        <?php
            if(isset($_GET['error'])){
                print '<p class="error">Clave erronea</p>';
            }
        ?>
        <p>Introduzca la clave z87: <input type="text" name="clave"></p>
        <input type="submit" name="confirmar" value="Enviar">
    </form>    
</body>
</html>