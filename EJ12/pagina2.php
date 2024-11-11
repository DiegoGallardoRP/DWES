<?php
    $nombre=$_REQUEST['nombre'];
    $comentario=$_REQUEST['comentario'];
    if(!file_exists("datos.txt")){
        $datos=fopen("datos.txt","w+");
        fwrite($datos,"---\n");
        fwrite($datos,"$nombre\n");
        fwrite($datos,"$comentario\n");
    }else{
        $datos=fopen("datos.txt","a+");
        fwrite($datos,"---\n");
        fwrite($datos,"$nombre\n");
        fwrite($datos,"$comentario\n");
    }
    print 'Se ha guardado el contenido en el fichero.';
    print 'Si desea ver el contenido pulse <a href="pagina3.php">aquí</a>';
?>