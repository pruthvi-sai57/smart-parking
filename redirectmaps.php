<!DOCTYPE html>
<html lang="en">
<head>
<?php
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
if(isset($_POST))
{
	$saddr=$_POST['saddrtextbox'];
	$daddr=$_POST['optn'];
	
}

?>
<script>

	var saddr1 = '<?php echo $saddr; ?>';
	var daddr1 = '<?php echo $daddr; ?>';
var encodedParam = encodeURIComponent('www.maps.google.com/maps?saddr1&daddr1');

alert(encodedParam);
window.location.href = 'encodedParam';




</script>
</head>
<body>
</body>
</html>