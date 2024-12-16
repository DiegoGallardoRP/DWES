<?php
    session_start();
    if(!isset($_SESSION['loggeado'])){
        header('location: login.php');
    }
    if(isset($_REQUEST['si'])){
        header('location: eliminarTodo2.php');
    }
    if(isset($_REQUEST['no'])){
        header('location: opciones.php');
    }
    print '<p>¿Estás seguro?</p>
    <p><input type=submit name="si" value="Sí"><input type=submit name="no" value="No"></p>';
?>