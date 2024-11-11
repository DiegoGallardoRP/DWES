<?php
    $directorio=opendir(".");
    print '<h1>CONTENIDO DEL DIRECTORIO</h1>';
    while($archivo=readdir($directorio)){
        if(is_dir($archivo)){
            print 'Nombre: '.$archivo.' Fecha:'.date("F d Y H:i:s.",filectime($archivo));
        }else{
            print 'Nombre: '.$archivo.' Fecha:'.date("F d Y H:i:s.",filectime($archivo)).' Tamaño: '.filesize($archivo);
        }
        echo '<br>';
    }
    closedir($directorio);
?>