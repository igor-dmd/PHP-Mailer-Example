<?php 
require './vendor/autoload.php';

$mail = new PHPMailer;

  //Initial configuration for gmail
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

  //Custom gmail configuration
$mail->Username = "SENDER EMAIL";
$mail->Password = "SENDER PASSWORD";

  //Variables for POST parameters
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

  //Custom email configuration
$mail->setFrom($email, $name);
$mail->addReplyTo($email, $name);
$mail->addAddress('RECEIVER EMAIL', 'RECEIVER NAME');
$mail->Subject = 'CUSTOM SUBJECT';
$mail->Body = $comments;

//send the message, check for errors
if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>