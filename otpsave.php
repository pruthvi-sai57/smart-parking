<?php 
session_start();
$flagotp=0;
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 


 date_default_timezone_set('Asia/kolkata');
  $tempstamp=date('Y-m-d H:i:s');
  $tempstamp1=strtotime($tempstamp);
  $r=$_SESSION['EML'];
  $result= mysqli_query($con,"SELECT * FROM bookingdetails where BOOKDATE=CURDATE() and EMAILID like '$r'") or die(mysql_error()); 
  $row=mysqli_fetch_assoc($result);
  $checktime=$row['OTPENDTIME'];
  $new_time1 = strtotime($checktime);
  $otpenter=$_POST['otptextbox'];
  $checkotp=$row['OTPGIVEN'];
 
$diff=$tempstamp1-$new_time1;
 if( $diff<=0 && $checkotp==$otpenter)
  {
	  
	  $res= mysqli_query($con,"UPDATE bookingdetails set OTPFLAG='1' where EMAILID like '$r'") or die(mysql_error()); 
	  $row=mysqli_fetch_assoc($res);
	  $bodyy="  You can park in your slot";
		 $by ="<script> alert('".$bodyy."'); window.location.href='parking.html';</script>";
		 echo $by;
		
		
  }
  else if($diff>0)
  {
	  $res= mysqli_query($con,"UPDATE bookingdetails set OTPFLAG='0' where EMAILID like '$r'") or die(mysql_error()); 
	 
	 $bodyy="  Your OTP IS EXPIRED and your booking is cancelled or you have entered invalid otp";
	 $by ="<script> alert('".$bodyy."'); window.location.href='parking.html';</script>";
	 echo $by; 
  }
  else 
  {
	 
	 $bodyy=" you have entered invalid otp";
	 $by ="<script> alert('".$bodyy."'); window.location.href='parking.html';</script>";
	 echo $by; 
  }
  

 
  
  
 
  
?>