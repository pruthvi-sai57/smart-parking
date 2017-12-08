<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
session_start();
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 

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

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
	
	



$address = 'pruthvisaiellur@gmail.com';
$mail->SetFrom('pruthvisaiellur@gmail.com', 'SMART PARKING SOLUTIONS');
$mail->Subject    = 'Booking details';
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Body = 'hello';
#$mail->Body = "$table;";
$mail->AltBody="Please Use a Html Compaible Email Veiwer";
$mail->FromName = "pruthvi sai";   
$mail->AddAddress($address, 'Smart Parking Solutions');


if(!$mail->Send())
{
   echo "Error sending: " . $mail->ErrorInfo;;
}
else
{
   echo "Message is sent";
}
?>


</body>
</html>







 	
	
 
 
 