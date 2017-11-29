<!DOCTYPE html>
<html lang="en">
<head>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';

require 'SMTP.php';
$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 
$mail->Host       = "smtp.gmail.com";      // SMTP server
$mail->Port       = 587;                   // SMTP port
$mail->Username   = "pruthvisaiellur@gmail.com";  // username
$mail->Password   = "sai12345";            // password

$mail->SetFrom('pruthvisaiellur@gmail.com', 'Test');

$mail->Subject    = "I hope this works!";

 $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'hi bro your booking id is 56 come to parking slot!!!!!! <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$address = "divyanshsrivastav84@gmail.com";
$mail->AddAddress($address, "Test");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
 ?>
 </head>
 <body>
 </body>
 </html>