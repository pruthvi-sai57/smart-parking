<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script> 
<script>
var emailpattern= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var carpattern=/^[a-zA-Z]{2}[ -][0-9]{1,2}(?: [a-zA-Z])?(?: [a-zA-Z]*)? [0-9]{4}$/;
var flag=0;
function checkEmail() {

    var email = document.getElementById('emailidtextbox');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
		flag=1;
    alert('Please provide a valid email address');
    email.focus;
	}
    return false;
 }
 
 function checkNum() {

    var vehicle1 = document.getElementById('vehicletextbox');
    var carpattern = /^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$/;

    if (!carpattern.test(vehicle1.value)) {
		flag=1;
    alert('Please provide a valid car number');
    email1.focus;
	}
    return false;
 }
/*function validateemail()
{

var emailval=document.getElementById("emailidtextbox").value;
	if((emailval.length)>0 || (emailval.length)<15)
	{
	//alert("email id must contain 8 chracters and maximum of 16 ");
		
	}
	else{
		alert("email id must contain 8 chracters and maximum of 16 ");
	}
	if(!emailpattern.test(emailval.value))
	{
		alert("invalid email");
		
	}

}*/

function validatecontact()
{
	
	var contactval=document.getElementById("contacttextbox").value;
	if(contactval.length!=10)
	{
		flag=1;
		alert("contact must be of 10 digits");
		
	}
	else if(isNaN(contactval))
	{
		alert("must input only numbers");
	}
}
function validatepassword()
{
	
	
	var p6=document.getElementById("passwordtextbox").value;
	
	
	if((p6.length)<3 || (p6.length)>10)
	{
		flag=1;
		alert("password must be minimum of 3 characters and maximum of 8 characters");
	}
	
}
function validateconfirmpassword()
{
	var p1=document.getElementById("passwordtextbox").value;
	var p2=document.getElementById("confirmpasswordtextbox").value;
	if((p1.localeCompare(p2))!==0)
	{
		flag=1;
		alert("password and confirm password must be equal");
	}
}	
function validatecarnum()
{
	
	var cnum=document.getElementById("vehicletextbox").value;
	if(cnum.length!=13)
	{
		flag=1;
		alert("vehicle number must contain 13 characters");
	}
	if(!carpattern.test(cnum.value))
	{
		flag=1;
		alert("car number pattern is not correct");
	}
	
	
}
//document.getElementById("hiddentextbox").innerHTML=flag;
</script>



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
      <li><a href="loginpage.html"><span class="glyphicon glyphicon-user"></span>Login</a></li>
    </ul>
  </div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-4">
			<h3>SIGNUP</h3>
			<form method="POST" action="signupconnectivity.php">
				<div class="form-group">
					<label for="emailidtextbox"><font color="white">Email Id</font></label>
					<input type="email" class="form-control" name="emailidtextbox" id="emailidtextbox" onblur="checkEmail();" required>
				</div>
				<div class="form-group">
					<label for="contacttextbox"><font color="white">Contact:</font></label>
					<input type="text" class="form-control" name="contacttextbox"  id="contacttextbox" onblur="validatecontact();" required>
				</div>
				<div class="form-group">
					<label for="passwordtextbox"><font color="white">Password:</font></label>
					<input type="password" class="form-control"  name="passwordtextbox"  id="passwordtextbox" onblur="validatepassword();" required>
				</div>
				<div class="form-group">
					<label for="confirmpasswordtextbox"><font color="white">ConfirmPassword:</font></label>
					<input type="password" class="form-control"  name="confirmpasswordtextbox" id="confirmpasswordtextbox" onblur="validateconfirmpassword();" required>
				</div>
				<div class="form-group">
					<label for="vehicletextbox"><font color="white">AddVehicle:</font></label>
					<input type="text" class="form-control"  name="vehicletextbox" id="vehicletextbox"  placeholder="KA 34 J1996" onblur="checkNum();"required>
				</div>
				<div class="form-group">
					
					<input type="hidden" class="form-control"  name="hiddentextbox" id="hiddentextbox">
				</div>
				<button type="submit" class="btn btn-success">SIGNUP</button>
			</form>
		</div>
		<div class="col-sm-4">
			
		</div>
	</div>
	</div>
<script>
document.getElementById("hiddentextbox").value=flag;
</script>
</body>

</html>