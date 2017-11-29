
<?php
session_start();
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
$b1flag=0;
 $b2flag=0;
  $b3flag=0;
   $b4flag=0;
    $b5flag=0;
	 $b6flag=0;
	 $b7flag=0;
	 $b8flag=0;

  if(isset($_POST['b1']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '1'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	 $slotnum=$row['SLOTNO'];
	 
		 if($colour==1)
	 {
		 
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '1'") or die(mysql_error()); 
		 $b1flag=1;
		 
		
	 }
	
	
	
  }
  
  $r=$_SESSION['EML'];
  if($b1flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
	echo $b1flag;
	
  }
  
	
	
 ?>
 
 
  <script>
  var flag=0;
  flag=" <?php echo $b1flag ?> ";
  alert("ih");
  
  if(flag==1)
  {
	  
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=1;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	
	alert("hello");
  alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
//window.location.href='displayslots1.php'; 
 }
  else if(flag==0)
  {
	  
	  alert("THIS SLOT IS ALREADY BOOKED, SELECT FREE SLOT IF AVIALABLE"); 
	
	  
	     window.location.href='displayslots1.php';
  }
 
 </script>
  <?php
	
		echo "<script>   alert('$b1flag');      </script>";
 
  
   if(isset($_POST['b2']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '2'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	 $slotnum=$row['SLOTNO'];
	 if($colour==1)
	 {
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '2'") or die(mysql_error()); 
		 $b2flag=1;
	 }
	 
  }
  if($b2flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
  }
 ?>
  <script>
  var flag= " <?php echo $b2flag ?> ";
  if(flag==1)
  {
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=2;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	window.location.href='displayslots1.php';

   alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
  }
  </script>
  <?php
	
	
  
  
  if(isset($_POST['b3']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '3'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	 $slotnum=$row['SLOTNO'];
	 if($colour==1)
	 {
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '3'") or die(mysql_error()); 
		 $b3flag=1;
	 }
	 
	  
  }
   if($b3flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
  }
 ?>
  <script>
  var flag= " <?php echo $b3flag ?> ";
  if(flag==1)
  {
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=3;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	window.location.href='displayslots1.php';

   alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
  }
  </script>
  <?php
	
	
  
   if(isset($_POST['b4']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '4'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	 $slotnum=$row['SLOTNO'];
	 if($colour==1)
	 {
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '4'") or die(mysql_error());
		$b4flag=1;
	 }
	 
  }
  if($b4flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
  }
 ?>
  <script>
  var flag= " <?php echo $b4flag ?> ";
  if(flag==1)
  {
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=4;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	window.location.href='displayslots1.php';

   alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
  }
  </script>
  <?php
	
	
  
   if(isset($_POST['b5']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '5'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	  $slotnum=$row['SLOTNO'];
	 if($colour==1)
	 {
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '5'") or die(mysql_error()); 
		 $b5flag=1;
	 }
	 
  }
  if($b5flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
  }
 ?>
  <script>
  var flag= " <?php echo $b5flag ?> ";
  if(flag==1)
  {
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=5;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	window.location.href='displayslots1.php';

   alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
  }
  </script>
  <?php
	
	
   if(isset($_POST['b6']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '6'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	 $slotnum=$row['SLOTNO'];
	 if($colour==1)
	 {
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '6'") or die(mysql_error()); 
		  $b6flag=1;
	 }
	
  }
  if($b6flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
  }
 ?>
  <script>
  var flag= " <?php echo $b6flag ?> ";
  if(flag==1)
  {
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=6;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	window.location.href='displayslots1.php';

   alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
  }
  </script>
  <?php
  if(isset($_POST['b7']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '7'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	 $slotnum=$row['SLOTNO'];
	 if($colour==1)
	 {
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '7'") or die(mysql_error()); 
		 $b7flag=1;
	 }
	 
  }
   if($b7flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
  }
 ?>
  <script>
  var flag=0;
   flag= " <?php echo $b7flag ?> ";
  if(flag==1)
  {
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=7;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	window.location.href='displayslots1.php';

   alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
  }
  else if(flag==0)
  {
	  alert("hello");
	   window.location.href='displayslots1.php';
	  alert("THIS SLOT IS ALREADY BOOKED, SELECT FREE SLOT IF AVIALABLE"); 
	 
  }
  </script>
  <?php
  if(isset($_POST['b8']))
  {
	   $result= mysqli_query($con,"SELECT * FROM SLOTSTATUS where SLOTNO like '8'") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result);
	 $colour=$row['STATUS'];
	 $slotnum=$row['SLOTNO'];
	 if($colour==1)
	 {
		 $result= mysqli_query($con,"UPDATE SLOTSTATUS set STATUS='0' where SLOTNO like '8'") or die(mysql_error()); 
		 $b8flag=1; 
	 }
	
  }
   if($b8flag==1)
  {
	  date_default_timezone_set('Asia/kolkata');
	  $date1=date('Y-m-d');
	  $time=date('H:i:s');
	  $time1=$time+4;
	  $etime=$time1;
	  #$etime=ADDTIME($time,'04:00:00');
	$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME) values('$slotnum','$r','$date1','$time','$etime')";
	if ($con->query($result) === TRUE) 
	{
		$last_id = $con->insert_id;
	}
  }
 ?>
  <script>
  var flag= " <?php echo $b8flag ?> ";
  if(flag==1)
  {
	var jlast_id = " <?php echo $last_id ?> ";
	var jslotno=8;
	var jr = " <?php echo $r ?> ";
	var jdate=" <?php echo $date1 ?> ";
	var jtime = " <?php echo $time ?> ";
	var jetime = " <?php echo $etime ?> ";
	window.location.href='displayslots1.php';

   alert("BOOKING DETAILS:\nBooking id:"+jlast_id+"\nslot no:"+jslotno+"\nEmailid:"+jr+"\nDate:"+jdate+"\nStart time:"+jtime+"\nEnd time:"+jetime);
  }
  </script>
  <?php
 
  #header('Location: ./displayslots1.php');

  ?>
  

  
  
  
  
  
  
  
  
  
  