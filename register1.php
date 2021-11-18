<?php
// Start the session
session_start();
?>
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form" method="post">
<div class="form-group">
<label>First Name</label><br/>
<input type="email" class="form-control rounded-left" placeholder="Username" required="" name="fname" /><br/>
<label>Last Name</label><br/>
<input type="text" name="lastname" value=""/><br/>
<label>Email</label><br/>
<input type="email" name="email" value=""/><br/>
<label>Password</label><br/>
<input type="password" name="password" value=""/><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
<a href="index.php">Sing In</a>
</body>
</html>
<?php
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fname=$_POST['fname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	//echo $fname;
	//echo $lname;
	//echo $email;
	//echo $password;
	$_SESSION['username']=$fname;
	$get_reg_user_query="Select * from user where email='$email'";
	$get_reg_user_result=mysql_query($get_reg_user_query);
	if(mysql_num_rows($get_reg_user_result)>0)
	{
		echo "Email is already registered";
	}
	else
	{
		$sql = "INSERT INTO user (first_name, last_name, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

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