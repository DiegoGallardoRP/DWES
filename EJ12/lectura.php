<?php
    $php=fopen("../EJGlobal.php","r");
    if(!$php) die("ERROR: no se ha podido abrir el fichero de datos");
    $ficheroSalida=fopen("fichero.txt","w+");
    $contenido=fread($php,filesize("../EJGlobal.php"));
    fwrite($ficheroSalida,$contenido);
    fclose($php);
    fclose($ficheroSalida);
    $tamanoFichero=filesize("fichero.txt");
    print '<p>El tamaño del fichero es: '.$tamanoFichero.'</p>';
?>