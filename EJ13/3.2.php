<?php
    $nombre=$_REQUEST['nombre'];
    if($nombre!=""){
        print 'Tu nombre es: '.$nombre;
    }else{
        header('location: 3.php?error=1');
    }
?>