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
 $t1=strcmp($row['EMAILID'],'pruthvisaiellur@gmail.com');
 $t2=strcmp($row['PASSWORD'],'Sai123456');
 if($t1==0 && $t2==0)
 {
	#header("LOCATION:parking.html");
	?>
	<script>
	alert("Admin logged in");
	window.location.href='adminlogin.php';
	</script>
	<?php
 }
 else if((strcmp($row['EMAILID'],$emailid) and strcmp($row['PASSWORD'],$password))!=0)
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