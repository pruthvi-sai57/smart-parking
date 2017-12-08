<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
$r=$_SESSION['EML'];
$i=0;
$flag=1;
$slotstatusflag=0;
 $result= mysqli_query($con,"SELECT * FROM bookingdetails  ") or die(mysql_error()); 
$affect=mysqli_affected_rows($con);
while($row=mysqli_fetch_array($result))
  {
	$bid[$i]=$row['BOOKINGID'];
	$bsltno[$i]=$row['SLOTNO'];
	$beid[$i]=$row['EMAILID'];
	$bdate[$i]=$row['BOOKDATE'];
	$bstime[$i]=$row['STARTTIME'];
	$betime[$i]=$row['ENDTIME'];
	$botpetime[$i]=$row['OTPENDTIME'];
	$botpgiven[$i]=$row['OTPGIVEN'];
	$botpflag[$i]=$row['OTPFLAG'];

	$i=$i+1;	
	
  }
  if($affect==0)
{
	$flag=0;
	$bid[$i]="";
	$bsltno[$i]="";
	$beid[$i]="";
	$bdate[$i]="";
	$bstime[$i]="";
	$betime[$i]="";
	$botpetime[$i]="";
	$botpgiven[$i]="";
	$botpflag[$i]="";
}
$i=0;
$slotstatusflag=1;
$result= mysqli_query($con,"SELECT * FROM slotstatus  ") or die(mysql_error()); 
$affect=mysqli_affected_rows($con);
while($row=mysqli_fetch_array($result))
  {
	
	$bslotno[$i]=$row['SLOTNO'];
	$bstatus[$i]=$row['STATUS'];
	$i=$i+1;	
	
  }
   if($affect==0)
{
	$slotstatusflag=0;
	$bslotno[$i]="";
	$bstatus[$i]="";
}
$i=0;
$user1flag=1;
$result= mysqli_query($con,"SELECT * FROM user1  ") or die(mysql_error()); 
$affect=mysqli_affected_rows($con);
while($row=mysqli_fetch_array($result))
  {
	
	$bpassword[$i]=$row['PASSWORD'];
	$bemailid[$i]=$row['EMAILID'];
	$bphone[$i]=$row['PHONE'];
	$bvehicleno[$i]=$row['VEHICLENO'];
	$i=$i+1;	
	
  }
   if($affect==0)
{
	$user1flag=0;
	$bpassowrd[$i]="";
	$bemailid[$i]="";
	$bphone[$i]="";
	$bvehicleno[$i]="";
}

$i=0;
$spacesflag=1;
$result= mysqli_query($con,"SELECT * FROM spaces  ") or die(mysql_error()); 
$affect=mysqli_affected_rows($con);
while($row=mysqli_fetch_array($result))
  {
	
	$bname[$i]=$row['NAME'];
	$bnooffreeslots[$i]=$row['NOOFFREESLOTS'];
	$bnoofbookedslots[$i]=$row['NOOFBOOKEDSLOTS'];
	$i=$i+1;	
	
  }
   if($affect==0)
{
	$spacesflag=0;
	$bname[$i]="";
	$bnooffreeslots[$i]="";
	$bnoofbookedslots[$i]="";
	
}
?>

  <style>
  .row1 { min-width: 100%; display: inline-block; background-color: yellow; }
   .row2 { min-width: 100%; display: inline-block; background-color: yellow; }
   .row3 { min-width: 100%; display: inline-block; background-color: yellow; }
   .row4 { min-width: 100%; display: inline-block; background-color: yellow; }
  
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
      <li><a href="index.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <a id="share1" type="button" class="btn btn-lg btn-default" style="visibility: visible" href="">ViewBookingdetails</a>
	<a id="share2" type="button" class="btn btn-lg btn-default" style="visibility: visible" href="">ViewSlotStatus</a>
	<a id="share3" type="button" class="btn btn-lg btn-default" style="visibility: visible" href="">ViewUsers</a>
	<a id="share4" type="button" class="btn btn-lg btn-default" style="visibility: visible" href="">ViewSpaces</a>
	
	<div class="row1" id="r1" style="visibility:hidden" >
		
		<table id="mytable1" width='100%' border='3' cellspacing='0' cellpadding='0'>

			<th>BOOKID</th>
			<th>SLOTNO</th>
			<th>EMAILID</th>
			<th>BOOKDATE</th>
			<th>STARTTIME</th>
			<th>ENDTIME</th>
			<th>OTPENDTIME</th>
			<th>OTPGIVEN</th>
			<th>OTPFLAG</th>
			
		</table>	
	</div>
	

	<div class="row2" id="r2" style="visibility:hidden" >
		
		<table id="mytable2" width='100%' border='3' cellspacing='0' cellpadding='0'>

			<th>SLOTNO</th>
			<th>STATUS</th>
			
		</table>	
	</div>
	
	<div class="row3" id="r3" style="visibility:hidden" >
		
		<table id="mytable3" width='100%' border='3' cellspacing='0' cellpadding='0'>

			<th>PASSWORD</th>
			<th>EMAILID</th>
			<th>PHONE</th>
			<th>VEHICLENO</th>
			
		</table>	
	</div>
	
	<div class="row4" id="r4" style="visibility:hidden" >
		
		<table id="mytable4" width='100%' border='3' cellspacing='0' cellpadding='0'>

			<th>NAME</th>
			<th>NOOFFREESLOTS</th>
			<th>NOOFBOOKEDSLOTS</th>
			
		</table>	
	</div>
</div>	

<script type="text/javascript">
   document.getElementById("share1").onclick = function(e) {
  e.preventDefault();
  document.getElementById("r1").style.visibility = 'visible';
  document.getElementById("r2").style.visibility = 'hidden';
  document.getElementById("r3").style.visibility = 'hidden';
  document.getElementById("r4").style.visibility = 'hidden';
  var jflag = " <?php echo $flag; ?> "; 
  var jbid=[]//new Array();
var jbsltno=[]//new Array();
var jbdate=[]//new Array();
var jbstime=[]//new Array();
var jbetime=[]//new Array();
var jbotpetime=[]//new Array();
var jbotpgiven=[]
var jbotpflag=[]


var i=0;
	var body="";
	var jbid= <?php echo json_encode($bid ); ?>;
	var jbsltno= <?php echo json_encode($bsltno); ?>;	
	var jbeid= <?php echo json_encode($beid); ?>;

	var jbdate= <?php echo json_encode($bdate ); ?>;
	var jbstime= <?php echo json_encode($bstime); ?>;
	var jbetime= <?php echo json_encode($betime); ?>;
    var jbotpetime= <?php echo json_encode($botpetime ); ?>;
	var jbotpgiven= <?php echo json_encode($botpgiven); ?>;
	var jbotpflag= <?php echo json_encode($botpflag); ?>;
    var j=0;
	var table = document.getElementById("mytable1");
	for(i=0;i<jbid.length;i++)
	{	
	
		j=i+1;
		var row = table.insertRow(j);
	    var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);
		var cell9 = row.insertCell(8);
		cell1.innerHTML = jbid[i];
		cell2.innerHTML = jbsltno[i];
		cell3.innerHTML = jbeid[i];
		cell4.innerHTML = jbdate[i];
		cell5.innerHTML = jbstime[i];
		cell6.innerHTML = jbetime[i];
		cell7.innerHTML = jbotpetime[i];
		cell8.innerHTML = jbotpgiven[i];
		cell9.innerHTML = jbotpflag[i];

	}
	
	
	//document.getElementByID(someID)style.visibility = 'hidden';


	
	
	
  
};


document.getElementById("share2").onclick = function(e) {
  e.preventDefault();
  document.getElementById("r2").style.visibility = 'visible';
  document.getElementById("r1").style.visibility = 'hidden';
  document.getElementById("r3").style.visibility = 'hidden';
  document.getElementById("r4").style.visibility = 'hidden';
  var jslotstatusflag = " <?php echo $slotstatusflag; ?> "; 
  var jbslotno=[]//new Array();
var jbstatus=[]//new Array();

var i=0;
	var body="";
	var jbslotno= <?php echo json_encode($bslotno ); ?>;
	var jbstatus= <?php echo json_encode($bstatus); ?>;	
	
    var j=0;
	var table = document.getElementById("mytable2");
	for(i=0;i<jbslotno.length;i++)
	{	
	
		j=i+1;
		var row = table.insertRow(j);
	    var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		cell1.innerHTML = jbslotno[i];
		cell2.innerHTML = jbstatus[i];
	
	}
	
	
	//document.getElementByID(someID)style.visibility = 'hidden';


	
	
	
  
};
document.getElementById("share3").onclick = function(e) {
  e.preventDefault();
  document.getElementById("r3").style.visibility = 'visible';
  document.getElementById("r1").style.visibility = 'hidden';
  document.getElementById("r2").style.visibility = 'hidden';
  document.getElementById("r4").style.visibility = 'hidden';
  var juser1flag = " <?php echo $user1flag; ?> "; 
  var jbpassword=[]//new Array();
var jbemailid=[]//new Array();
var jbphone=[]//new Array();
var jbvehicleno=[]//new Array();

var i=0;
	var body="";
	var jbpassword= <?php echo json_encode($bpassword ); ?>;
	var jbemailid= <?php echo json_encode($bemailid); ?>;
    var jbphone= <?php echo json_encode($bphone ); ?>;
	var jbvehicleno= <?php echo json_encode($bvehicleno); ?>;	
	
    var j=0;
	var table = document.getElementById("mytable3");
	for(i=0;i<jbpassword.length;i++)
	{	
	
		j=i+1;
		var row = table.insertRow(j);
	    var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		cell1.innerHTML = jbpassword[i];
		cell2.innerHTML = jbemailid[i];
		cell3.innerHTML = jbphone[i];
		cell4.innerHTML = jbvehicleno[i];
	
	}
	
	
	//document.getElementByID(someID)style.visibility = 'hidden';


	
	
	
  
};



document.getElementById("share4").onclick = function(e) {
  e.preventDefault();
  document.getElementById("r4").style.visibility = 'visible';
  document.getElementById("r1").style.visibility = 'hidden';
  document.getElementById("r2").style.visibility = 'hidden';
   document.getElementById("r3").style.visibility = 'hidden';
 
  var jspacesflag = " <?php echo $spacesflag; ?> "; 
  var jbname=[]//new Array();
var jbnooffreeslots=[]//new Array();
var jbnoofbookedslots=[]//new Array();


var i=0;
	var body="";
	var jbname= <?php echo json_encode($bname ); ?>;
	var jbnooffreeslots= <?php echo json_encode($bnooffreeslots); ?>;
    var jbnoofbookedslots= <?php echo json_encode($bnoofbookedslots ); ?>;
	
	
    var j=0;
	var table = document.getElementById("mytable4");
	for(i=0;i<jbname.length;i++)
	{	
	
		j=i+1;
		var row = table.insertRow(j);
	    var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		
		cell1.innerHTML = jbname[i];
		cell2.innerHTML = jbnooffreeslots[i];
		cell3.innerHTML = jbnoofbookedslots[i];
		
	
	}
	
	
	//document.getElementByID(someID)style.visibility = 'hidden';


	
	
	
  
};

</script>
</body>

</html>