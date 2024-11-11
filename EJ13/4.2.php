<?php
$edad=intval($_REQUEST['edad']);
if(!$edad){
    header('location: 4.php?error=1');
}elseif(!filter_var($edad, FILTER_VALIDATE_INT)){
    header('location: 4.php?error=2');
}elseif($edad<18 || $edad>130){
    header('location: 4.php?error=3');
}else{
    print 'Tu edad es: '.$edad;
}
?>