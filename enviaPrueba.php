<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '007alvaro007@gmail.com';                 // SMTP username
    $mail->Password = 'A2310199711a';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('007alvaro007@gmail.com', $nombre);
    $mail->addAddress('alvaro.alvarez.porcel@hotmail.com'/*, 'Joe User'*/);     // Add a recipient

    /* Para enviar imagenes, archivos adjuntos y demas
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    */

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your restaurant - Mensaje';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<script>
    alert("El mensaje se envio correctamente")
    window.history.go(-1)';
} catch (Exception $e) {
    echo 'Ocurrió un error al enviar el mensaje: ', $mail->ErrorInfo;
}