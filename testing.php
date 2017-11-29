
<?php
$countfree=0;
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
 $result= mysqli_query($con,"SELECT * FROM slotstatus ") or die(mysql_error()); 
 while ($row=mysqli_fetch_array($result))
 {
  if($row['STATUS']==0)
	$countfree=$countfree+1;
 }
echo $countfree;
$countbook=8-$countfree;
echo $countbook;
$colg='bvb college of engineering and technology';
$res= mysqli_query($con,"UPDATE spaces set NOOFFREESLOTS = '$countfree' where NAME like '$colg' ") or die(mysql_error()); 
$res1= mysqli_query($con,"UPDATE spaces set NOOFBOOKEDSLOTS = '$countbook' where NAME like '$colg'") or die(mysql_error()); 
echo "hello";
?>
