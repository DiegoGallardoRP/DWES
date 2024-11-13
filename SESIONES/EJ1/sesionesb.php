<?php
    $usuario=$_REQUEST['usuario'];
    $clave=$_REQUEST['clave'];
    print "<p>Usuario: $usuario</p> 
        <p>Clave: $clave</p>
        <a href='sesionesc.php'>Destruir sesion</a>";
        session_start();
        unset($_SESSION['sesion']);
?>