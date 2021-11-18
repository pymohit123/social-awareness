<?php
// Start the session
session_start();
$name=$_SESSION['username'];
if($name==null)
{
	header("location: index.php");
}
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
				
				<h3><?php echo $_SESSION['username'];  ?></h3>
				<ul class="menu">
				<li><a href="dashboard.php">All Posts</a></li>
				<li><a href="alluser.php">All Users</a></li>
				<li><a href="logout.php">Logout</a></li>
				</li>
			</div>
			<div class="right-side">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	
		      	<h3 class="text-center mb-4">All Posts by Users</h3>
		      	<table>
				<tr><th>Title</th><th>Descirption</th><th>Status</th><th>Action</th></tr>
					 <?php
include("connect.php");

	

	


	$sql1="Select * from advertisement";
	$res=mysql_query($sql1);

	$row = mysql_num_rows($res);
	
	
		while($result=mysql_fetch_array($res))
		{
			?>
			
			<tr><td><?php echo $post_title=$result[1];?></td><td><?php echo $result[2] ?></td><td><?php if($result[4]==0){echo "Inactive";}else{echo "Active";} ?></td><td><?php echo '<a href="update.php?id='.$result[0].'">Edit</a>' ?></td>
			</tr>

		<?php } ?>
		

		
		
	



</table>
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