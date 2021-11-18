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
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Username" name="email" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" minlength="5" class="form-control rounded-left" placeholder="Password" name="password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>

	          </form>
	          <div class="message">
	          <?php
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	

//$sql = "INSERT INTO user (first_name, last_name, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
//
//if (mysql_query($sql)) {
//  echo "New record created successfully";
//} else {
//  die('Could not insert: ' . mysql_error());
//}
//
	$sql1="Select * from admin where username='$email'";
	$res=mysql_query($sql1);

	$row = mysql_num_rows($res);
	//echo $row;
	if($row==1)
	{
		while($result=mysql_fetch_array($res))
		{
			$_SESSION['userid']=$result[0];
			$_SESSION['username']=$result[1];
		}
		

		//echo $result[0];
		//echo "Welcome to SAI";
		header("Location: dashboard.php");
	}
	else
	{
		echo "No account exist with these login details";
	}
}
?>
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

	</body>
</html>

