<?php
session_start();
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
if(isset($_POST))
{
	$emailid=$_POST['emailidtextbox'];
	$password=$_POST['passwordtextbox'];
}
  $result= mysqli_query($con,"SELECT * FROM user1 where EMAILID like '$emailid' and PASSWORD like '$password'") or die(mysql_error()); 
  $row=mysqli_fetch_assoc($result);
 $_SESSION['EML']=$emailid;
 if((strcmp($row['EMAILID'],$emailid) and strcmp($row['PASSWORD'],$password))!=0)
	{
		?>
	<script>
	alert("Login failed");
	window.location.href='loginpage.html';
	</script>
	<?php
	}
	else
	{
		header("LOCATION:parking.html");
	}
 
 

?>