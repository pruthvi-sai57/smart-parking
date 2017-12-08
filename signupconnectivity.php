<html>


<head>

<?php
$flag=0;
$cflag=0;
$ccheck=0;
$echeck=0;
$vcheck=0;
$result1=0;
$echecke=0;
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
$emailid=$_POST['emailidtextbox'];
$contact=$_POST['contacttextbox'];
$password=$_POST['passwordtextbox'];
$confirmpassword=$_POST['confirmpasswordtextbox'];
$vehiclenumber=$_POST['vehicletextbox'];
$hiddenflag=$_POST['hiddentextbox'];
if(preg_match("/^[0-9]{10}$/", $contact)) {
  $flag=1;
}
echo $hiddenflag;

function checkUnique($email1,$contact1,$vehiclenumber1) {
	$conn=new mysqli("localhost","root","","user");
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $sql="SELECT * FROM user1 where EMAILID like '$email1'";
	$result=$conn->query($sql);
	$echeck=$result->num_rows ;
	
	$sql="SELECT * FROM user1 where PHONE like '$contact1'";
	$result=$conn->query($sql);
	$ccheck=$result->num_rows ;
	
	$sql="SELECT * FROM user1 where VEHICLENO like '$vehiclenumber1'";
	$result=$conn->query($sql);
	$vcheck=$result->num_rows ;
	
	if($echeck>0)
	{
		?>
		<script>
		alert("Email already exists!");
		</script>
		<?php
	}
	if($ccheck>0)
	{
		?>
		<script>
		alert("Contact already exists!");
		</script>
		<?php
	}
	if($vcheck>0)
	{
		?>
		<script>
		alert("Vehicle already added!");
		</script>
		<?php
	}
	
	
	if ($echeck>0 || $ccheck>0 || $vcheck>0 ) {
        return true;
    }
	else{
		return false;
	}
}
if(checkUnique($emailid,$contact,$vehiclenumber))
{
	$cflag=1;
}
else
{
	$cflag=0;
}
	
/*if(strlen($vehiclenumber)!=13)
{
	?>
		<script>
		alert("vehicle number should conatin 13 characters only!");
		
		</script>
		<?php
		$flag=1;
}
/*if(!preg_match("/^(([A-Za-z]){2,3}(|-)(?:[0-9]){1,2}(|-)(?:[A-Za-z]){2}(|-)([0-9]){1,4})|(([A-Za-z]){2,3}(|-)([0-9]){1,4})$/",$vehiclenumber)) {
 ?>
		<script>
		alert("vehicle number is not valid");
		
		</script>
		<?php
		$flag=1;
}
*/
if($cflag==1 || $hiddenflag==1)
{
	?>
	<script>
	alert("could not sign you in");
	window.location.href='signuppage.php';
	</script>
	<?php
}
else
{
	
	$conn=new mysqli("localhost","root","","user");
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $sql="INSERT into user1(PASSWORD,EMAILID,PHONE,VEHICLENO) values('$password','$emailid','$contact','$vehiclenumber')";
	$result=$conn->query($sql);
	//$result= mysqli_query($con,"INSERT into user1(PASSWORD,EMAILID,PHONE,VEHICLENO) values('$password','$emailid','$contact','$vehiclenumber')") or die(mysql_error()); 
	?>
	<script>
	window.location.href='parking.html';
	alert("successfully signed in");
	
	</script>
	<?php
}

?>
</head>
<body>
</body>
</html>