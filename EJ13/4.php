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
    <form action="4.2.php" method="post">
        <?php
        if(isset($_REQUEST['error'])){
            $error=$_GET['error'];
            if($error==1){
                print '<p class="error">ERROR: Está vacío</p>';
            }elseif($error==2){
                print '<p class="error">ERROR: No es un número</p>';
            }elseif($error==3){
                print'<p class="error">ERROR: Debe poner un número entre 18 y 130</p>';
            }
        }
        
        ?>
        <p>Introduzca su edad (Entre 18 y 130): <input type="text" name="edad"></p>
        <p><input type="submit" name="enviar" value="Enviar"><input type="reset" value="Borrar"></p>
    </form>
</body>
</html>