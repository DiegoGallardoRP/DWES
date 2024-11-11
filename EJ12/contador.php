<?php
if(!file_exists("contador.txt")){
    $contFichero=fopen("contador.txt","w+");
    fwrite($contFichero,"0");
    fclose($contFichero);
}
    $contFichero=fopen("contador.txt","r+");
    $cont=intval(fread($contFichero,filesize("contador.txt")));
    $cont++;
    fseek($contFichero,0);
    fwrite($contFichero,$cont);
    fclose($contFichero);
    print 'Contador: '.$cont;
?>