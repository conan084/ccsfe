<?php

// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;

// require_once './vendor/autoload.php';
  
$resultMessage = '';

if (!empty($_FILES["attachment"])) {
  // create a new object
  $mail = new PHPMailer();

  // configure an SMTP
  $mail->isSMTP();
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'mail.sfe.epesf';
  $mail->SMTPAuth = true;
  $mail->Port = 25;
  $mail->Username = 'conan084';
  $mail->Password = '';


  $mail->setFrom('hcossu@epe.santafe.gov.ar', 'Address from');
  $mail->addAddress('hcossu@epe.santafe.gov.ar', 'Address to');
  $mail->Subject = 'Email with attachment';
  $mail->isHTML(true);
  $mail->Body = '<h1>Hi there </h1>';

  $mail->AddAttachment($_FILES["attachment"]["tmp_name"], $_FILES["attachment"]["name"]);

 if($mail->send()) {
    $resultMessage = 'Message has been sent';
  } else {
    $resultMessage = 'Message could not be sent.';
  }

}

?>