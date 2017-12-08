<!DOCTYPE html>
<html lang="en">
<head>
<?php
$countfree=0;
$con=mysqli_connect("localhost","root","","user") or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,"user") or die("Failed to connect to MySQL: " . mysql_error()); 
 $result= mysqli_query($con,"SELECT * FROM slotstatus where '1'") or die(mysql_error()); 
 while ($row=mysqli_fetch_array($result))
 {
  if($row['STATUS']==0)
	$countfree=$countfree+1;
 }
#echo $countfree;




$countbook=8-$countfree;
$colg='bvb college of engineering and technology';
$res= mysqli_query($con,"UPDATE spaces set NOOFFREESLOTS = '$countfree' where NAME like '$colg' ") or die(mysql_error()); 
$res1= mysqli_query($con,"UPDATE spaces set NOOFBOOKEDSLOTS = '$countbook' where NAME like '$colg'") or die(mysql_error()); 

?>


  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="jquery-ui.css">

  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="jquery-1.12.4.js"></script>
  <script src="jquery-ui.js"></script>

   <script src="http://maps.google.com/maps/api/js?key=AIzaSyCOPrhpkhtDh9cl5b2m7y9wvBAGunVrj5U
&sensor=false" 
          type="text/javascript"></script>
  <style>

 #wrapper {
  display: flex;
  border: 1px solid black;
}
#map {
  width: 200px;
  border: 1px solid black;
  
  /* Just so it's visible */
}
#second {
  flex: 1;
  border: 1px solid black;
  /* Grow to rest of container */
 
  /* Just so it's visible */
}
</style>




</head>
<body background="audi_tt_sports_car-wallpaper-1366x768.jpg">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SMARTPARK</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
	  <li class="active"><a href="howitworks.php">HOW IT WORKS</a></li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signuppage.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="loginpage.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<h2 align="center"><font color="white">SMART PARKING RESERVATION SYSTEM</font></h2>
</div>
<div class="container" id="wrapper">
<div id="map" class="dis1" style="width: 500px; height: 400px; align:right;"></div>
<script type="text/javascript">
    var locations = [
      ['BVB College Of Engineering And Technology', 15.369092, 75.121620],
      ['Urban oasis mall',15.353067, 75.110585],
      ['U Mall', 15.348097, 75.143173]
      
    ];
	var infoWindowContent = ['0','0','0'];
        
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(15.366574, 75.122877),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
	var val=i;
	var str="";
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
		var simple = '<?php echo $countfree; ?>';
		str=locations[i][0];
		 str=str+":\n"+"free slots ";
		 str= str+simple+" ";
		  infowindow.setContent(str);
          infowindow.open(map, marker);
        }
      })(marker, i));
	 
    }
  </script>
 <script>
 $( function() {
    var availableTags = [
      "bvb college of engineering and technology",
      "u mall",
      "urban oasis mall",
      "vidya nagar"
      
    ];
    $( "#daddr" ).autocomplete({
      source: availableTags
    });
  } );
  
  $( function() {
    var availableTags1 = [
      "bvb college of engineering and technology",
      "u mall",
      "urban oasis mall",
      "vidya nagar",
	  "sadashiv nagar",
	  "shirur park",
	  "old bustand",
	  "nav nagar"
      
    ];
    $( "#saddr" ).autocomplete({
      source: availableTags1
    });
  } );
  </script>


<div class="dis2" id="second">
	<h3><font color="white"> Already booked a slot get directions to the parking place </font></h3>
	<form action= "http://maps.google.com/maps" method= "get" target ="_blank">
		<font color="white">Enter your starting address:</font><br>
		<input type="text" name="saddr" id="saddr"><br><br>
		<font color="white">Enter the destination address:</font><br>
		<input type="text" name="daddr" id="daddr"><br><br>

        <input type= "submit" value= "getdirections" >

    </form>

</div>

</div>
</body>
</html>