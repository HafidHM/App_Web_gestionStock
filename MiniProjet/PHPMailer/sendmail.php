<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.outlook.com';  //a changer     // remplacer outlook avec gmail ou quelque chose autre mais un domaine
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hafid.mohamed.z@outlook.fr';                 //a changer    //faut utiliser un mail standard faut cree un compte outlook c est mieux avec ton numero
    $mail->Password = 'mohamed123';         //a changer                  // Il faut maitre le mot de pass de ton compte ou tu peux utiliser un mail standart avec lequel on envoi les mail vers e directeur

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('mohamed.hafid.z@outlook.fr');         //a changer       // encore le mail de l app
    $mail->addAddress('karim.rafik.4321@gmail.com');      //a changer       // Add a recipient


    //Content
    $mail->isHTML(true);                                                  // Set email format to HTML
    $mail->Subject = 'il faut changer par un sujet ';        //a changer       //Sujet
    $mail->Body    = 'tu peux faire nimporte quoi la ';      //a changer
    $mail->AltBody = 'la tu entre le message a envoyer';     //a changer
    $mail->send();      //envoyer le message


    ///cette partie de debugage
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}