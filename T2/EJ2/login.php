<?php
session_start();
if(isset($_REQUEST['enviar'])){
    $usuario=$_REQUEST['usuario'];
    $clave=$_REQUEST['clave'];
    if($usuario=='DAW2' && $clave=='Canaveral2024'){
        $_SESSION['loggeado']=true;
        header('location: opciones.php');
        exit;
    }else{
        header('location: login.php?error=1');
        exit;
    }    
}

print '<form action="login.php" method="post">
<p>Usuario: <input type="text" name="usuario"></p>
<p>Clave: <input type="text" name="clave"></p>';
if(isset($_REQUEST['error'])){
    print '<p style="color: red">usuario/clave erróneos</p>';
}
print '<p><input type="submit" name="enviar" value="Enviar"><input type="reset" value="Reiniciar"></p>
</form>';
?>