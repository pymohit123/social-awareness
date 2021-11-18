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
	<section class="ftco-section inside-page">
		<div class="container">
			<div class="left-side">
				
				<h3><?php echo $_SESSION['username']; echo $_SESSION['lastname']; ?></h3>
				<ul class="menu">
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="post-ad.php">Post Advertisement</a></li>
				<li><a href="logout.php">Logout</a></li>
				</li>
			</div>
			<div class="right-side">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	
		      	<h3 class="text-center mb-4">Post Advertisement</h3>
						<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Ad Title" name="ad_title" required>
		      		</div>
		      		<div class="form-group">
		      			<textarea class="form-control rounded-left" Placeholder="Ad Description " name="ad_description" rows="10" cols="20"></textarea>
		      		</div>
		      		
	            <div class="form-group d-flex">
	              <input type="text" class="form-control rounded-left" placeholder="Landing Page link" name="ad_link" required>
	            </div>
	            <div class="form-group">
		      			<input type="file" name="fileToUpload" id="fileToUpload">
		      		</div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
	            </div>
	 
	          </form>
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
<?php
//echo $_SESSION['username'];
$userid=$_SESSION['userid'];
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$ad_title=$_POST['ad_title'];
	$ad_des=$_POST['ad_description'];
	$ad_link=$_POST['ad_link'];
	$sql="INSERT INTO `Advertisement` (`Ad_title`, `Ad_details`, `Ad_link`, `ad_status`, `author`) VALUES ('$ad_title', '$ad_des', '$ad_link', '0', '$userid')";
	if(mysql_query($sql))
	{
		header('location: dashboard.php');
	}
	else
	{
		die('Could not insert: ' . mysql_error());
	}
}
?>