<?php
include("connect.php");

$postid=$_GET['id'];
$sql1="update advertisement set ad_status='1' where Ad_id='$postid'";
if(mysql_query($sql1)==True)
{
	header("Location: dashboard.php");
}
else
{
	echo mysql_error();
}

?>