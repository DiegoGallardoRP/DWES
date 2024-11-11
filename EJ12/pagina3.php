<?php
    $datosFichero=fopen("datos.txt","r+");
    while(!feof($datosFichero)){
        print fgets($datosFichero).'<br>';
    }
    fclose($datosFichero);
?>