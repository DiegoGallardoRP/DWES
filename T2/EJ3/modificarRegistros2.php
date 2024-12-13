<?php
session_start();
if (!isset($_SESSION['loggeado'])) {
    header('location: login.php');
    exit;
}

print '<a href="opciones.php">Menú principal</a>';
print '<a href="modificarRegistros.php">Volver</a>';
if (isset($_REQUEST['enviar'])) {
    if(isset($_REQUEST['id'])){
        print '<p>Indique los campos que desee modificar</p>
        <form action="modificarRegistros3.php" method="post">
        <p>Nombre <input type="text" name="nombre"></p> 
        <p>Apellidos <input type="text" name="apellidos"></p> 
        <p>Direccion <input type="text" name="direccion"></p> 
        <p>Teléfono <input type="text" name="telefono"></p>
        <p><input type="hidden" name="id" value="'.$_REQUEST['id'].'"></p>
        <p><input type="submit" name="enviar" value="Modificar campos"><input type="reset" value="Resetear formulario"></p> 
        </form>';
    }else{
        print 'No se ha seleccionado ningún registro';
    }    
}
?>