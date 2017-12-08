<html>


<head>

 <?php
session_start();
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';

require 'SMTP.php';
$mail             = new PHPMailer(true);

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
			#$otp1=1234;
		  $senderId = "MSGIND";
		  
		  $message1 = urlencode("  Your booking id is ".$last_id." OTP is ". $otp1 . " enter the otp within 15 minutes when you reach to parking space  ");
//Define route 
$route = "default";

$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
$curl = curl_init();

curl_setopt_array($curl, array(
 CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?authkey=$authkey1&message=$message1&sender=$senderId&mobile=$mobileNumber&otp= $otp1&otp_length=4",
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

$bodyy="User Name : $r   Date : $date1  Booking id : $last_id  Start time : $time  End time : $new_time1  OTP : $otp1 ";			
#$by ="<script> alert('".$bodyy."'); window.location.href='displayslots1.php';</script>";
#echo $by;





$table= "<table width='100%' border='3' cellspacing='0' cellpadding='0'>";
$table .="<th>Booking details</th>";
$table .="<th>Data</th>";

	
 $table .="<tr>";
	$table .="<td>user name</td>";
    $table .="<td>$r</td>";
 $table .="</tr>";
 $table .="<tr>";
    $table .="<td>Booking date</td>";
    $table .="<td>$date1</td>";
 $table .="</tr>";	
 $table .="<tr>";
    $table .="<td>Booking id</td>";
    $table .="<td>$last_id</td>";
 $table .="</tr>";	
 $table .="<tr>";	
     $table .="<td>Start Time</td>";
    $table .="<td>$time</td>";
 $table .="</tr>";	
 $table .="<tr>";	
     $table .="<td>End Time</td>";
    $table .="<td>$new_time1</td>";
 $table .="</tr>";	
 $table .="<tr>";	
    $table .="<td>OTP</td>";
    $table .="<td>$otp1</td>";
 $table .="</tr>";	
 $table .="</table>";
	
	
	
$address = $r;
$mail->SetFrom('pruthvisaiellur@gmail.com', 'SMART PARKING SOLUTIONS');
$mail->Subject    = "Booking details";
$mail->isHTML(true);                                  // Set email format to HTML
#$mail->Body = $bodyy;
$mail->Body = "$table;";
$mail->AltBody="Please Use a Html Compaible Email Veiwer";
$mail->FromName = "pruthvi sai";   
$mail->AddAddress($address, "Smart Parking Solutions");
$mail->addAttachment('thankyou.jpg');


if ($err){
  echo "cURL Error #:" . $err;
} else {
  			echo "<script> alert('OTP Successfully sent to registered mobile number!'); </script>";

}



if(!$mail->Send())
{
   echo "Error sending: " . $mail->ErrorInfo;;
}
else
{
   echo "Letter is sent";
}



	
	$result= mysqli_query($con,"update bookingdetails set OTPGIVEN='$otp1'  WHERE BOOKINGID like '$last_id'");
  



 }		

  
  
  
 
?>


<link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="jquery-ui.css">

  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>



 

<script>
function test(){
	
var val = " <?php echo $bodyy ?> "; 
var popupTemplate =
  '<div class="modal fade">' +
  '  <div class="modal-dialog">' +
  '    <div class="modal-content">' +
  '      <div class="modal-header">' +
  '        <button type="button" class="close" data-dismiss="modal">&times;</button>' +
  '        <h4 class="modal-title">BOOKING DETAILS</h4>' +
  '      </div>' +
  '      <div class="modal-body" >' +val+ '</div>' +
  '      <div class="modal-footer">' +'<a id="share1" type="button" class="btn btn-lg btn-default" style="visibility: visible" href="displayslots1.php">OK</a>'+
	
  '      </div>' +
  '    </div>' +
  '  </div>' +
  '</div>';

$(popupTemplate).modal();
}
window.onload=test;
</script>

</head>
<body>


</body>

</html>



 	
	
 
 
 