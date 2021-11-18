<?php
$servername = "localhost";
$username = "root";
$password = "mohit@123";
$dbname = "SAI_DB";

// Create connection
$conn = mysql_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }


//echo "Connected successfully";
mysql_select_db($dbname, $conn);
?>