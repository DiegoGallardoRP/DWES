<?php
$to = 'destinatario@dominio.com';  // Cambia esta dirección por la que deseas recibir el correo
$subject = 'Prueba de correo';
$message = 'Este es un correo de prueba enviado desde PHP.';
$headers = 'From: diegophp2025@gmail.com' . "\r\n" .
           'Reply-To: diegophp2025@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
    echo 'Correo enviado exitosamente.';
} else {
    echo 'No se pudo enviar el correo.';
}
?>