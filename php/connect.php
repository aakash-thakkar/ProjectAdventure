<?php 
$server="localhost";
$username="root";
$password="root";
$db="wildr";

$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn)
	echo "Failed to connect";


?>