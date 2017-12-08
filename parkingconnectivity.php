<?php

$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
if(isset($_POST))
{
	$searchplace=$_POST['searchplacetextbox'];
	$searchplace1=strtolower($searchplace);
}

$result= mysqli_query($con,"SELECT * FROM spaces where NAME like '$searchplace1' ") or die(mysql_error()); 
  $row=mysqli_fetch_assoc($result);
  if(is_numeric($searchplace1))
  {
	  ?>
	<script>
	alert("There should  be  only alphabets");
	window.location.href='parking.html';
	</script>
	<?php
	  $flag=1;
  }
if(strcmp($row['NAME'],$searchplace1) == 0)
	{
		?>
	<script>
	window.location.href='displayslots1.php';
	</script>
	<?php
	}
	else
	{
		?>
	<script>
	alert("there are no parking places in that area");
	window.location.href='parking.html';
	</script>
	<?php
	}
  
 ?>