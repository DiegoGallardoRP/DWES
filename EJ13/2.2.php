<?php
    if(isset($_REQUEST['confirmar'])){        
        if($_REQUEST['clave']=="z87"){
            print 'BIENVENIDO';
        }else{
            header('Location: 2.php?error=1'); 
            exit;           
        }
    }
?>