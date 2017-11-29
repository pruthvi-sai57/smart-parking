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



 if(isset($_POST['sub']))
  {
	  $r=$_SESSION['EML'];
	  $selected=$_POST['options'];
	  $res= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='1' where SLOTNO like '$selected'") or die(mysql_error());  
		   date_default_timezone_set('Asia/kolkata');
			  $date1=date('Y-m-d');
			  $time=date('H:i:s');
			  $new_time = date("Y-m-d H:i:s", strtotime('+4 hours'));
			  $new_time1 = date("H:i:s",strtotime($new_time));
			  $new_timeotp = date("Y-m-d H:i:s", strtotime('+2 minutes'));
			  $new_time1otp = date("H:i:s",strtotime($new_timeotp));
			  $stampend=date('Y-m-d H:i:s');
			  $stampend1=strtotime($stampend);
			  $futureDate = $stampend1+(60*240);
			  $formatDate = date("Y-m-d H:i:s", $futureDate);
			  $dateotp=date('Y-m-d H:i:s');
			  $otptimestamp=strtotime($dateotp);
			  $otptimestampenddisp=$otptimestamp+(60*2);
			  $otpfinal = date("Y-m-d H:i:s", $otptimestampenddisp);
			  $result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,ENDTIMESTAMP,OTPENDTIME) values('$selected','$r','$date1','$time','$new_time1','$formatDate','$otpfinal')";
			  if ($con->query($result) === TRUE) 
			  {
				$last_id = $con->insert_id;
			  }
			  
			$res= mysqli_query($con,"SELECT * from user1 where EMAILID like '$r'") or die(mysql_error()); 
		    $row=mysqli_fetch_assoc($res);
			$mobileNumber=$row['PHONE'];
			#$mobileNumber='91 8105333035';
			$authkey1="184247AuFyP9goc4G5a0f475d";
			 $otp1=mt_rand(1000,9999);
			
		  $senderId = "MSGIND";
		  
		  $message1 = urlencode("  Your booking id is ".$last_id." OTP is ". $otp1 . " enter the otp within 15 minutes when you reach to parking space  ");
//Define route 
$route = "default";

$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
$curl = curl_init();

curl_setopt_array($curl, array(
 # CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?authkey=$authkey1&message=$message1&sender=$senderId&mobile=$mobileNumber&otp= $otp1&otp_length=4",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$bodyy="User Name : $r   Date : $date1  Booking id : $last_id  Start time : $time  End time : $new_time1   ";			
$by ="<script> alert('".$bodyy."'); window.location.href='displayslots1.php';</script>";
echo $by;


$mail->SetFrom('pruthvisaiellur@gmail.com', 'Test');

$mail->Subject    = "I hope this works!";

 $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $bodyy;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$address = "divyanshsrivastav84@gmail.com";
$mail->AddAddress($address, "Test");



if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
} 
  


#if ($err){#
#  echo "cURL Error #:" . $err;
#}# else {
  			#echo "<script> alert('OTP Successfully sent to registered mobile number!'); </script>";

#}#

	$otp1='2345';
	$result= mysqli_query($con,"update bookingdetails set OTPGIVEN='$otp1'  WHERE BOOKINGID like '$last_id'");
  



 }		

  
  
  
 
?>







 	
	
 
 
 