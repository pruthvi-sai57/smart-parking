<html>


<head>
<?php 

$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 

$result= mysqli_query($con,"SELECT * FROM bookingdetails where BOOKDATE=CURDATE()") or die(mysql_error()); 
while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
  {
	   date_default_timezone_set('Asia/kolkata');
			  
	 $timecur=date('H:i:s');
	 $timecurstr=strtotime($timecur);
	 $time1=$row['ENDTIME'];
	 $time2=$row['OTPENDTIME'];
	 $stampstart=$row['STARTTIMESTAMP'];
	 $stampend=$row['ENDTIMESTAMP'];
	 $optflag1=$row['OTPFLAG'];
	 $tempstamp=date('Y-m-d H:i:s');
	 $tempstamp1=strtotime($tempstamp);
	 $timestr2=strtotime($time2);
	$diff1=$tempstamp1-$timestr2;
	$testtime=strtotime($stampend);
	$diff2=$tempstamp1-$testtime;
	if(($diff2>120 && $diff2>0) || ($diff1>0 && $optflag1==0))
	{
		
		$t1=$row['SLOTNO'];
		$t2=$row['BOOKINGID'];
		$t3=$row['OTPGIVEN'];
		$res= mysqli_query($con,"UPDATE slotstatus set STATUS='0' where SLOTNO like '$t1'") or die(mysql_error()); 
		$result1= mysqli_query($con,"DELETE FROM bookingdetails WHERE BOOKINGID like '$t2' ") or die(mysql_error()); 
	
	}
	
  }
 $i=0;
$result = json_decode(exec('python try_with_video.py'), true);
foreach($result as $results){
    foreach($results as $key => $val){
        $myarray[$i] = $val;
		$i=$i+1;
					
    }
}
 foreach($myarray as $arr){
	$j=$arr;
	$value=0;
		$result1= mysqli_query($con,"DELETE FROM bookingdetails WHERE SLOTNO like '$j' ") or die(mysql_error()); 
	
	$res= mysqli_query($con,"UPDATE slotstatus set STATUS='1' where SLOTNO like '$j'") or die(mysql_error()); 
	if($j==1)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','pal.rohit975@gmail.com','2017-12-05','13:00:34','16:00:34','2017-12-05 13:00:34','2017-12-03 16:00:34','2017-12-02 16:02:34','7930','1')";
	else if($j==2)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','darshannayak@gmail.com','2017-12-05','13:50:34','16:50:34','2017-12-05 13:50:34','2017-12-03 16:50:34','2017-12-02 16:52:34','7931','1')";
	else if($j==3)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','pal.rohit975@gmail.com','2017-12-05','13:59:34','16:59:34','2017-12-05 13:59:34','2017-12-03 16:59:34','2017-12-02 17:00:34','7932','1')";
	else if($j==4)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','darshannayak@gmail.com','2017-12-05','12:50:34','15:50:34','2017-12-05 12:50:34','2017-12-03 15:50:34','2017-12-02 15:52:34','7933','1')";
	else if($j==5)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','pal.rohit975@gmail.com','2017-12-05','12:57:34','15:57:34','2017-12-05 12:57:34','2017-12-03 15:57:34','2017-12-02 15:59:34','7934','1')";
	else if($j==6)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','darshannayak@gmail.com','2017-12-05','13:45:34','16:45:34','2017-12-05 13:45:34','2017-12-03 16:45:34','2017-12-02 16:47:34','7935','1')";
	else if($j==7)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','pal.rohit975@gmail.com','2017-12-05','12:40:34','15:40:34','2017-12-05 12:40:34','2017-12-03 15:40:34','2017-12-02 15:42:34','7936','1')";
	else if($j==8)
		$result = "INSERT into bookingdetails(SLOTNO,EMAILID,BOOKDATE,STARTTIME,ENDTIME,STARTTIMESTAMP,ENDTIMESTAMP,OTPENDTIME,OTPGIVEN,OTPFLAG) values('$j','darshannayak@gmail.com','2017-12-05','12:42:34','15:42:34','2017-12-05 12:42:34','2017-12-03 15:42:34','2017-12-02 15:44:34','7937','1')";
	
		 if ($con->query($result) === TRUE) 
			  {
				$last_id = $con->insert_id;
			  }	 
	#$result1= mysqli_query($con,"SELECT * FROM bookingdetails where SLOTNO like '$arr' ") or die(mysql_error()); 
	#$row=mysqli_fetch_assoc($result1);
	#$value=$row['BOOKINGID'];
	#if($value)
	#{#
		#$result2= mysqli_query($con,"DELETE FROM bookingdetails WHERE BOOKINGID like '$value' ") or die(mysql_error()); 
	#}#
		
	
 }
 
  $result= mysqli_query($con,"SELECT * FROM slotstatus ") or die(mysql_error()); 
  $i=0;

while($row=mysqli_fetch_array($result))
  {
	$slot[$i]=$row['SLOTNO'];
	$status[$i]=$row['STATUS'];
	
	$i=$i+1;	
	
  }
?>
<script>
  function onready1(){ 
  
  

	var arrslot=[]//new Array();
	var arrstatus=[]//new Array();
	var id,x;
	<?php $j=0; ?>
	
		
		var jslot= <?php echo json_encode($slot ); ?>;
		var arrstatus= <?php echo json_encode($status ); ?>;
		
		
		 for(var i=0;i<8;i++) {
		 if( arrstatus[i]==1)
		 {
			
			document.getElementById("op"+ jslot[i]+ "").setAttribute('class',"btn btn-danger");
			document.getElementById("op"+ jslot[i]+ "").setAttribute("disabled","disabled");
		}
		 else if(arrstatus[i]==0)
		 {
				document.getElementById("op"+ jslot[i]+ "").setAttribute('class',"btn btn-success");
		 
			
		 }
		 }
	
		
	
	
	
	}
 window.onload = onready1;
  </script>
  <?php


?>
<style>
.foo {
  float: left;
  width: 20px;
  height: 20px;
  margin: 5px;
  border: 1px solid rgba(0, 0, 0, .2);
}

.green {
  background: #008000   ;
}

.red {
  background: #ff0000;
}
</style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body background="audi_tt_sports_car-wallpaper-1366x768.jpg">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SMARTPARK</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      
    </ul>
     <ul class="nav navbar-nav navbar-right">
      
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="parking.html">Cancel booking</a></li>
          <li><a href="index.php">Logout</a></li>
		  <li><a href="bookingdetails.php">Booking details</a></li>
		   <li><a href="parking.html">Enter the otp</a></li>
        </ul>
      </li>
      
    </ul>
  </div>
</nav>

<div class="container">

<div class="row">
<div class="col-md-12">
<p> <br><br> <br> </p>
</div>

</div>


<div class="row">
<div class="col-md-3">
</div>

<div class="col-md-6" align="center">

<form action="book.php" method="post">

<div class="btn-group" data-toggle="buttons" >
  <label id="op1" class="btn btn-success ">
    <input type="radio" name="options" id="1" autocomplete="off" value="1" required> Slot 1
  </label>
  <label id="op2" class="btn btn-success">
    <input type="radio" name="options" id="2" autocomplete="off" value="2" required> Slot 2
  </label>
  <label id="op3" class="btn btn-success">
    <input type="radio" name="options" id="3" autocomplete="off" value="3" required> Slot 3
  </label>
  <label id="op4" class="btn btn-success">
    <input type="radio" name="options" id="4" autocomplete="off" value="4" required> Slot 4
  </label>
  <label id="op5" class="btn btn-success">
    <input type="radio" name="options" id="5" autocomplete="off" value="5" required> Slot 5
  </label>
  <label id="op6" class="btn btn-success">
    <input type="radio" name="options" id="6" autocomplete="off" value="6" required> Slot 6
  </label>
  <label id="op7" class="btn btn-success">
    <input type="radio" name="options" id="7" autocomplete="off" value="7" required> Slot 7
  </label>
   <label id="op8" class="btn btn-success">
    <input type="radio" name="options" id="8" autocomplete="off" value="8" required> Slot 8
   </label>
    
  
</div>
<br>
<br>
<input type="submit" name="sub" value="Book" class="btn btn-warning" align="right">
</form>

</div>

<div class="col-md-3">
</div>


</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-4">
			<div class="foo green"></div><h6><font color="white"> FREE SLOTS</font></h6>
			<div class="foo red"></div><h6><font color="white"> BOOKED SLOTS</font></h6>
		</div>
		<div class="col-sm-4">
			
		</div>
	<div>
<div>

</body>

</html>