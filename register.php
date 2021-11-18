<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Advanced Consulting Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="left-side">
				<h1>Advanced Consulting Services</h1>
				<h3>Social Awareness Application</h3>
				<img src="images/sia-img.png" />
			</div>
			<div class="right-side">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Register</h3>
		      	<?php
		      	$fnameErr =$lnameErr = $emailErr  = "";
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fname=$_POST['fname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$role=$_POST['role'];
	//echo $fname;
	//echo $lname;
	//echo $email;
	//echo $password;
	//echo $FNAME;
	if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
		echo "test";
      $fnameErr = "Only letters and white space allowed";
    }
	$_SESSION['username']=$fname;
	$get_reg_user_query="Select * from user where email='$email'";
	$get_reg_user_result=mysql_query($get_reg_user_query);
	if(mysql_num_rows($get_reg_user_result)>0)
	{
		echo "Email is already registered";
	}
	else
	{
		$sql = "INSERT INTO user (first_name, last_name, email, password, user_roles) VALUES ('$fname', '$lname', '$email', '$password', $role)";

		if (mysql_query($sql)) {
			header('location: dashboard.php');
		  //echo "New record created successfully";
		} else {
		  die('Could not insert: ' . mysql_error());
		}

		$sql1="Select * from user";
		$res=mysql_query($sql1);
		echo $res;
		$row = mysql_num_rows($res);
		echo $row;
	}
}
?>
						<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form" method="post" name="myform">
		      		<div class="form-group">
		      			<input type="text" id="fname" class="form-control rounded-left" placeholder="First Name" name="fname" required onfocusout="return fnamevalidate();">
		      			<span class="error" id="f_error_msg"> </span>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" id="lname" class="form-control rounded-left" placeholder="Last Name" name="lastname" required onfocusout="return lnamevalidate();">
		      			<span class="error" id="l_error_msg"> </span>
		      		</div>
		      		<div class="form-group">
		      			<input type="email" id="email1" class="form-control rounded-left" placeholder="Email" name="email" required onfocusout="return validateemail();">
		      			<span class="error" id="e_error_msg"> </span>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" minlength="5" class="form-control rounded-left" placeholder="Password" name="password" required>
	              <span class="error" id="p_error_msg"> </span>
	            </div>
	            <div class="form-group d-flex">
	            	<label>Do you own a business?</label></br>
	              <input type="radio" minlength="5" class="form-control rounded-left user-role" placeholder="Yes" name="role" value="2" required> Yes
	              <input type="radio" minlength="5" class="form-control rounded-left user-role" placeholder="no" name="role" value="1" required> No
	              <span class="error" id="p_error_msg"> </span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<a href="index.php">Login</a>
								</div>
								<div class="w-50 text-md-right">
									
								</div>
	            </div>
	          </form>
	          <div class="message">

	          </div>
	        </div>
				</div>
			</div>
		</div>
		</div><!--Container-->
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
<script>  


function fnamevalidate(){
    var regName = /^[a-zA-Z]+$/;
    var name = document.getElementById('fname').value;
    if(!regName.test(name)){
        document.getElementById('f_error_msg').innerHTML = "Please enter a valid First Name";
        document.myform.fname.focus();
        document.getElementById('f_error_msg').style.display = "block";
        return false;
    }else{
        document.getElementById('f_error_msg').style.display = "none";
        
    }
}

function lnamevalidate(){
    var regName = /^[a-zA-Z]+$/;
    var name = document.getElementById('lname').value;
    if(!regName.test(name)){
        document.getElementById('l_error_msg').innerHTML = "Please enter a valid Last Name";
        document.myform.lastname.focus();
        document.getElementById('l_error_msg').style.display = "block";
        return false;
    }else{
        document.getElementById('l_error_msg').style.display = "none";
        
    }
}


function validateemail()  
{  
var x=document.myform.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  //alert("Please enter a valid e-mail address");  
  document.getElementById('e_error_msg').innerHTML = "Please enter a valid e-mail address ";
  document.myform.email.focus();
  document.getElementById('e_error_msg').style.display = "block";
  return false;  
  }  
  else
  {
  	document.getElementById('e_error_msg').style.display = "none";
  }
}  
</script> 
	</body>
</html>
