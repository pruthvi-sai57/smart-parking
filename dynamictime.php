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
$result = json_decode(exec('python test1.py'), true);
foreach($result as $results){
    foreach($results as $key => $val){
        $myarray[$i] = $val;
		$i=$i+1;
					
    }
}
 foreach($myarray as $arr){
	$j=$arr;
	$value=0;
	$res= mysqli_query($con,"UPDATE slotstatus set STATUS='0' where SLOTNO like '$j'") or die(mysql_error()); 
	$result1= mysqli_query($con,"SELECT * FROM bookingdetails where SLOTNO like '$arr' ") or die(mysql_error()); 
	$row=mysqli_fetch_assoc($result1);
	$value=$row['BOOKINGID'];
	if($value)
	{
		$result2= mysqli_query($con,"DELETE FROM bookingdetails WHERE BOOKINGID like '$value' ") or die(mysql_error()); 
	}
		
	
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
      <li class="active"><a href="index.html">Home</a></li>
      
    </ul>
     <ul class="nav navbar-nav navbar-right">
      
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="parking.html">cancel booking</a></li>
          <li><a href="index.html">logout</a></li>
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

<form action="testing.php" method="post">


<input type="submit" name="sub" value="Book" class="btn btn-warning" align="right">
</form>

</div>

<div class="col-md-3">
</div>


</div>
</div>
</body>

</html>