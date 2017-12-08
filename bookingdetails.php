<html>
<head>
<style>
  .row1 { min-width: 100%; display: inline-block; background-color: yellow; }
  </style>

<?php 
session_start();
$flag=1;
$i=0;
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
$r=$_SESSION['EML'];
$result= mysqli_query($con,"SELECT * FROM bookingdetails where EMAILID like '$r' ") or die(mysql_error()); 
$affect=mysqli_affected_rows($con);
while($row=mysqli_fetch_array($result))
  {
	$bid[$i]=$row['BOOKINGID'];
	$bsltno[$i]=$row['SLOTNO'];
	$bdate[$i]=$row['BOOKDATE'];
	$bstime[$i]=$row['STARTTIME'];
	$betime[$i]=$row['ENDTIME'];
	
	$i=$i+1;	
	
  }
if($affect==0)
{
	$flag=0;
	$bid[$i]="";
	$bsltno[$i]="";
	$bdate[$i]="";
	$bstime[$i]="";
	$betime[$i]="";
}
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
      <li class="active"><a href="index.php">Home</a></li>
      
    </ul>
     <ul class="nav navbar-nav navbar-right">
      
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="parking.html">cancel booking</a></li>
          <li><a href="index.php">logout</a></li>
		   <li><a href="displayslots1.php">back</a></li>
		  
        </ul>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
	<div class="row1">
			<p id="bookdetails"></p>	
	</div>
</div>

<script>
function onready1(){
var jbid=[]//new Array();
var jbsltno=[]//new Array();
var jbdate=[]//new Array();
var jbstime=[]//new Array();
var jbetime=[]//new Array();
		
var jflag = " <?php echo $flag; ?> "; 
if(jflag==0)
{
	
 alert("You have not booked any slots yet");
 document.getElementById('bookdetails').innerHTML="You have not booked any slots yet";
 window.location.href='displayslots1.php';
 
}else{
	var i=0;
	var body="";
	var jbid= <?php echo json_encode($bid ); ?>;
		var jbsltno= <?php echo json_encode($bsltno); ?>;	
		var jbdate= <?php echo json_encode($bdate ); ?>;
		var jbstime= <?php echo json_encode($bstime); ?>;
		var jbetime= <?php echo json_encode($betime); ?>;
	
	for(i=0;i<jbid.length;i++)
	{
		body=body+"Booking id: "+jbid[i]+"\n"+"Slot no: "+jbsltno[i]+"\n"+"Book date: "+jbdate[i]+"\n"+"Start time: "+jbstime[i]+"\n"+"End time: "+jbetime[i]+"\n";
		body=body+"-------------------------";
	}

document.getElementById('bookdetails').innerHTML=body;
}
}
 window.onload = onready1;
</script>



</body>

</html>