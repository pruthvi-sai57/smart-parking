<?php

$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
 if(isset($_POST['bookingidtextbox']))
{
	$bookid=$_POST['bookingidtextbox'];
	
	
$pflag=0;
$result1= mysqli_query($con,"SELECT * from bookingdetails WHERE BOOKINGID like '$bookid' ") or die(mysql_error()); 
   $row1=mysqli_fetch_assoc($result1);
  
   $sltnum=$row1['SLOTNO'];
  
  $result= mysqli_query($con,"DELETE FROM bookingdetails WHERE BOOKINGID like '$bookid' ") or die(mysql_error()); 
   $row=mysqli_affected_rows($con);
   
   if($row==0)
   {
	  
	   $pflag=1;
	  #$bodyy="Booking id   doesnt exist ";
	  $bodyy="  Booking id : $bookid  does not exist";
			#header('Location: displayslots1.php');
			$by ="<script> alert('".$bodyy."'); window.location.href='parking.html';</script>";
			echo $by;
		

   }
   else 
   {
	 
	   $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '$sltnum' ") or die(mysql_error()); 
		
		#$bodyy="Booking id  is successfully cancelledd  ";
		 $bodyy="  Booking id :  $bookid  is successfully cancelled  ";
			
			$by ="<script> alert('".$bodyy."'); window.location.href='parking.html';</script>";
			echo $by;
			
		}
}
   
   ?>
	