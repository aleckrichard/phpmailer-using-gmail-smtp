<?php

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//Asignar a las variables los datos del formulario capturados por el método POST
$nombre = $_POST['nombre']; 
$correo = $_POST['emailfrom'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';  // Especificar email SMTP de Google
$mail->SMTPAuth = true;                               // Habilita Autenticación SMTP
$mail->Username = 'misuario@gmail.com';                 // Usuario SMTP de GMAIL que será utilizada para hacer el envío de correos
$mail->Password = 'mipassgmail';                           // Contaseña SMTP de la cuenta de GMAIL para el envío
$mail->SMTPSecure = 'ssl';                            // Habilita encriptación SSL
$mail->Port = 465;                                    // Puerto TCP para SSL

$mail->setFrom('no-responder@mail.com', $nombre . " " . $correo); // Concatena el nombre y correo que el usuario introduce en el formulario
$mail->addAddress('usuariodestino@mail.com');  //Cuenta de Destino  

$mail->Subject = $asunto;
$mail->Body    = $mensaje;

if(!$mail->send()) {
    echo 'Error, mensaje no enviado';
    echo 'Error del mensaje: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje se ha enviado correctamente';
    
}